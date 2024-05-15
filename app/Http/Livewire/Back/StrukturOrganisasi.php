<?php

namespace App\Http\Livewire\Back;

use App\Models\Jabatan;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\UserOrganization;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class StrukturOrganisasi extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $jabatan_id, $name, $img, $email,  $telp, $alamat, $ig, $fb, $twitter, $linkedin, $jenkel, $username, $oldImg;
    public $selected_stu_id;
    public $stu;

    public $updateStuMode = false;
    public $selectAll = false;
    public $search = '';
    public $checkedStu = [];
    public ?int $selectedStu = null;
    public $userOrganizations;
    public $listeners = [
        'resetModalForm',
        'deleteStuAction',
        'updateStuOrdering',
        'deleteCheckedStu'

    ];
    public function updatedSelectAll($value)
    {

        if ($value == 1) {
            $this->checkedStu = UserOrganization::pluck('id')->toArray();
        } else {
            $this->checkedStu = [];
        }
    }
    public function mount()
    {
        $this->resetPage();
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->name = null;
        $this->img = null;
        $this->email = null;
        $this->jabatan_id = null;
        $this->telp = null;
        $this->alamat = null;
        $this->ig = null;
        $this->fb = null;
        $this->twitter = null;
        $this->linkedin = null;
    }

    public function addStu()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'jenkel' => 'required',
            'telp' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'required',
            'img' => 'required|image|mimes:png,jpeg,jpg|max:2048'
        ], [
            'name' => 'Nama lengkap wajib diisi.',
            'email' => 'Email wajib diisi.',
            'jenkel' => 'Jenis kelamin wajib dipilih',
            'telp' => 'Telphone wajib diisi.',
            'jabatan_id' => 'Jabatan wajib diisi.',
            'alamat' => 'Alamat wajib diisi',
            'img' => 'Picture wajib diisi.',
            'img.image' => 'File bukan image.',
            'img.mimes' => 'Picture harus berextensi :jpg.png.jpeg.',
            'img.max' => 'Piture max 2MB',
        ]);

        $stu = new UserOrganization();
        $stu->name = $this->name;
        $stu->email = $this->email;
        $stu->jenkel = $this->jenkel;
        $stu->jabatan_id = $this->jabatan_id;
        $stu->telp = $this->telp;
        $stu->fb = $this->fb;
        $stu->twitter = $this->twitter;
        $stu->linkedin = $this->linkedin;
        $stu->ig = $this->ig;
        $stu->alamat = $this->alamat;
        $stu->username = Str::slug($this->name);

        $path = "images/album/stu/";
        $file = $this->img;
        $filename = $file->getClientOriginalName();
        $new_filename = Str::slug($this->name) . '' . $filename;
        $img = ImageManagerStatic::make($this->img)->encode('jpg');
        $file = Storage::disk('public')->put($path . $new_filename, $img);
        $stu->img = $new_filename;
        $saved = $stu->save();
        if ($saved) {
            $this->resetModalForm();
            $this->emit('reloadPage');
            $this->dispatchBrowserEvent('hideStuModal');
            flash()->addSuccess('Data has been successfuly added.');
        } else {
            flash()->addError('Something went wrong!');
        }
    }
    public function editStu($id)
    {
        $stu = UserOrganization::findOrFail($id);
        $this->selected_stu_id = $stu->id;
        $this->name = $stu->name;
        $this->email = $stu->email;
        $this->telp = $stu->telp;
        $this->alamat = $stu->alamat;
        $this->jabatan_id = $stu->jabatan_id;
        $this->fb = $stu->fb;
        $this->twitter = $stu->twitter;
        $this->linkedin = $stu->linkedin;
        $this->ig = $stu->ig;
        $this->jenkel = $stu->jenkel;
        $this->oldImg = $stu->img;
        $this->updateStuMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showstuModal');
    }
    public function updateStu()
    {
        $stu = UserOrganization::findOrFail($this->selected_stu_id);
        $photo = $stu->img;
        if ($this->img) {
            $this->validate([
                'img' => 'mimes:png,jpg,jpeg|max:2048',
            ], [
                'img.mimes' => 'Image harus ber-Extensi JPG.JPEG.PNG',
                'img.max' => 'Maksimal Image 2MB'
            ]);
            $path = "images/album/stu/";
            if ($photo != null && Storage::disk('public')->exists($path . $photo)) {
                Storage::disk('public')->delete($path . $photo);
            }
            $file = $this->img;
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '' . $filename;
            $img = ImageManagerStatic::make($this->img)->encode('jpg');
            $file = Storage::disk('public')->put($path . $new_filename, $img);


            $updated =  $stu->update([
                'name' => $this->name,
                'email' => $this->email,
                'jenkel' => $this->jenkel,
                'jabatan_id' => $this->jabatan_id,
                'telp' => $this->telp,
                'alamat' => $this->alamat,
                'fb' => $this->fb,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'ig' => $this->ig,
                'img' => $new_filename,
            ]);
            if ($updated) {
                $this->dispatchBrowserEvent('hideStuModal');
                $this->updateStuMode = false;
                $this->resetModalForm();
                flash()->addSuccess('Data has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        } else {
            $updated =  $stu->update([
                'name' => $this->name,
                'email' => $this->email,
                'jenkel' => $this->jenkel,
                'jabatan_id' => $this->jabatan_id,
                'telp' => $this->telp,
                'alamat' => $this->alamat,
                'fb' => $this->fb,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'ig' => $this->ig,
                'img' => $this->oldImg
            ]);
            if ($updated) {
                $this->dispatchBrowserEvent('hideStuModal');
                $this->updateStuMode = false;
                $this->resetModalForm();
                flash()->addSuccess('Data has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }

    public function deleteStu($st)
    {
        $this->dispatchBrowserEvent('deleteStu', [
            'title' => 'Apakah anda yakin?',
            'html' => 'Data yang di hapus tidak dapat dikembalikan! dengan nama user: <br>' . $st['name'] . '<br>',
            'id' => $st['id']
        ]);
    }
    public function deleteStuAction($id)
    {
        $st = UserOrganization::find($id);
        if ($st) {
            if ($st->img && Storage::disk('public')->exists('images/album/stu/' . $st->img)) {
                Storage::disk('public')->delete('images/album/stu/' . $st->img);
            }
            $st->delete();
            flash()->addSuccess('User has been successfully deleted.');
        } else {
            flash()->addError('User not found.');
        }
    }
    public function deleteSelectedStu()
    {
        $this->dispatchBrowserEvent('swal:deleteStu', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete this All',
            'checkedIDs' => $this->checkedStu,
        ]);
    }

    public function deleteCheckedStu($ids)
    {
        $users = UserOrganization::whereIn('id', $ids)->get();

        foreach ($users as $user) {
            if ($user->img && Storage::disk('public')->exists('images/album/stu/' . $user->img)) {
                Storage::disk('public')->delete('images/album/stu/' . $user->img);
            }
            $user->delete();
        }

        flash()->addSuccess('User has been successfully deleted!');
        $this->checkedStu = [];
    }
    public function render()
    {
        $stus = UserOrganization::join('jabatans', 'user_organizations.jabatan_id', '=', 'jabatans.id')
        ->select('user_organizations.*', 'jabatans.ordering')
        ->when($this->search, function ($query) {
            $query->where('user_organizations.name', 'like', '%' . $this->search . '%')
                  ->orWhere('user_organizations.email', 'like', '%' . $this->search . '%');
        })
        ->orderBy('jabatans.ordering', 'asc')
        ->paginate(10);
        $jabatans = Jabatan::doesntHave('userOrganization')
            ->orderBy('ordering', 'asc')
            ->get();
        return view('livewire.back.struktur-organisasi', [
            'stus' => $stus,
            'jabatans' => $jabatans
        ]);
    }
}
