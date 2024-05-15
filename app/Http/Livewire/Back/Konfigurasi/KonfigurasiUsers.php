<?php

namespace App\Http\Livewire\Back\Konfigurasi;

use App\Models\Role;
use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\ButtonPendaftaranAnggota;

class KonfigurasiUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $roleFilter = '';
    public $perPage = 10;
    public $selected_user_id;

    public $name, $email, $username, $role, $jenis_kelamin;
    public $FilterUserActive = '';
    public $checkedUser = [];
    public $selectAll = false;
    public ?int $selectedUser = null;
    public $pendaftaranAktif;
    protected $listeners = [
        'resetInputFields',
        'deleteUserAction',
        'deleteCheckedUser'
    ];
    public function updatedSelectAll($value)
    {

        if ($value == 1) {
            $this->checkedUser = User::pluck('id')->toArray();
        } else {
            $this->checkedUser = [];
        }
    }
    public function mount()
    {
        $this->resetPage();
        $button = ButtonPendaftaranAnggota::first();
        $this->pendaftaranAktif = $button ? $button->isActive : false;
    }
    public function togglePendaftaran()
    {
        $button = ButtonPendaftaranAnggota::firstOrCreate();
        $button->isActive = !$button->isActive;
        $button->save();

        if ($button->isActive) {
            flash()->addSuccess('Pendaftaran anggota berhasil diaktifkan.');
        } else {
            flash()->addSuccess('Pendaftaran anggota berhasil dinonaktifkan.');
        }

        $this->pendaftaranAktif = $button->isActive;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInputFields()
    {
        $this->name = null;
        $this->email = null;
        $this->username = null;
        $this->role = null;
        $this->jenis_kelamin = null;
    }
    public function addAuthor()
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username|min:6|max:20',
                'role' => 'required',
                'jenis_kelamin' => 'required',
            ],
            [
                'role.required' => 'Pilih role',
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'username.required' => 'Username wajib diisi',
                'username.unique' => 'Username sudah ada.',
                'username.min' => 'Username minimal 6 karakter',
                'username.max' => 'Username minimal 20 karakter',
                'email.email' => 'Masukan email valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            ]
        );

        if ($this->isOnline()) {
            DB::beginTransaction();
            try {
                $default_password = Random::generate(8);

                $author = new User();
                $author->name = $this->name;
                $author->email = $this->email;
                $author->password = Hash::make($default_password);
                $author->username = Str::slug($this->username);
                $author->email_verified_at = now();
                $author->save();
                $author->assignRole($this->role);
                $author->profile()->create([
                    'jenis_kelamin' => $this->jenis_kelamin // Pastikan Anda memiliki properti ini di komponen Livewire
                ]);
                $author->load('roles');

                $roleName = $author->roles->isNotEmpty() ? $author->roles->first()->name : 'No Role Assigned';

                $data = [
                    'name' => $this->name,
                    'username' => $this->username,
                    'email' => $this->email,
                    'password' => $default_password,
                    'role' => $roleName,
                    'url' => route('login'),
                    'jenis_kelamin' => $this->jenis_kelamin
                ];
                $author_email = $this->email;
                $author_name = $this->name;

                $webs = Setting::all();
                foreach ($webs as $web) {
                    $web_e = $web ? $web->web_email_noreply : 'default@example.com';
                    $web_n = $web ? $web->web_name : 'Default Web Name';
                }
                Mail::send('new-user-email-template', $data, function ($message) use ($web_e, $web_n, $data, $author_email, $author_name) {
                    $message->from($web_e, $web_n);
                    $message->to($author_email, $author_name)
                        ->subject('Account creation.');
                });

                DB::commit();

                flash()->addSuccess('New user has been successfully added.');
                $this->resetInputFields();
                $this->dispatchBrowserEvent('hide_add_user_modal');
            } catch (\Exception $e) {
                DB::rollback();
                flash()->addError('An error occurred: ' . $e->getMessage());
                Log::error('Error adding user: ' . $e->getMessage());
            }
        } else {
            flash()->addError('You are offline, check your connection and submit form again later');
        }
    }
    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }


    public function editUser($user)
    {
        $user = User::with('roles')->find($user['id']);
        $this->selected_user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->role = $user->roles->first()->name ?? null; // Pastikan ini sesuai dengan struktur data role Anda

        $this->dispatchBrowserEvent('showEditUserModal');
    }

    public function updateUser()
    {
        $this->validate([
            'selected_user_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selected_user_id,
            'username' => 'required|unique:users,username,' . $this->selected_user_id,
            'role' => 'required',
        ]);

        try {
            $user = User::find($this->selected_user_id);
            if ($user) {
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'username' => $this->username,
                ]);

                $user->syncRoles($this->role);
                flash()->addSuccess('User has been successfully updated.');

                $this->dispatchBrowserEvent('hide_edit_user_modal');
                $this->resetInputFields();
            }
        } catch (\Exception $e) {
            $this->addError('updateError', 'Error updating user: ' . $e->getMessage());
        }
    }

    public function deleteUser($user)
    {
        $this->dispatchBrowserEvent('deleteUser', [
            'title' => 'Apakah anda yakin?',
            'html' => 'Data yang di hapus tidak dapat dikembalikan! dengan nama user: <br>' . $user['name'] . '<br>',
            'id' => $user['id']
        ]);
    }
    public function deleteUserAction($id)
    {

        $user = User::find($id);
        if ($user->id == 1) {
            flash()->addError('User cannot be deleted.');
            return;
        }

        $user->delete();
        Log::info("User with ID $id has been successfully deleted.");
        flash()->addSuccess('User has been successfully deleted.');
    }
    public function deleteSelectedUser()
    {
        $this->dispatchBrowserEvent('swal:deleteUser', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete this All User',
            'checkedIDs' => $this->checkedUser,
        ]);
    }

    public function deleteCheckedUser($ids)
    {
        $filteredIds = array_filter($ids, function ($id) {
            return $id != 1;
        });

        if (!empty($filteredIds)) {
            $users = User::whereIn('id', $filteredIds)->get();
            foreach ($users as $user) {
                $user->delete();
            }
            flash()->addSuccess('User has been successfully deleted!');
        } else {
            flash()->addError('User cannot be deleted.');
        }

        $this->checkedUser = [];
    }
    public function render()
    {
        $query = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })
            ->when($this->FilterUserActive !== '', function ($query) {
                $query->where('isActive', $this->FilterUserActive);
            });

        if (!empty($this->roleFilter)) {
            $query->role($this->roleFilter);
        }

        $users = $query->paginate($this->perPage);

        $roles = Role::get();

        return view('livewire.back.konfigurasi.konfigurasi-users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
