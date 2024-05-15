<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{

    public $user, $name, $email, $username,  $no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_kelamin;
    public $loading = false;

    public function mount()
    {
        $this->user = User::with('profile')->where('id', auth('web')->user()->id)->first();

        if (!$this->user) {
            // Handle the case where the user is not found
            flash()->addError('User tidak ditemukan.');

            return; // Optionally redirect or perform other actions
        }

        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;

        // Check if the user has a profile
        if ($this->user->profile) {
            $this->no_hp = $this->user->profile->no_hp;
            $this->tempat_lahir = $this->user->profile->tempat_lahir;
            $this->tanggal_lahir = $this->user->profile->tanggal_lahir;
            $this->alamat = $this->user->profile->alamat;
            $this->jenis_kelamin = $this->user->profile->jenis_kelamin;
        } else {
            // Initialize profile related properties to empty if no profile exists
            $this->no_hp = '';
            $this->tempat_lahir = '';
            $this->tanggal_lahir = '';
            $this->alamat = '';
            $this->jenis_kelamin = '';
        }
    }

    public function editUser(User $user)
    {
        $this->loading = true;

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth('web')->id(),
            'username' => 'required|unique:users,username,' . auth('web')->id(),
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'E-mail wajib diisi.',
            'email.unique' => 'E-mail sudah ada, silahkan coba E-mail yang lain.',
            'email.email' => 'E-mail harus berisi @gmail.com',
            'username' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan.',
            'no_hp.required' => 'No hp wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi'
        ]);
        $this->no_hp = preg_replace('/^0?8/', '628', $this->no_hp);
        $user = User::find(auth()->id()); // Dapatkan user berdasarkan auth id

        // Update data user
        $user->name = $this->name;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->save(); // Simpan perubahan user

        // Cek apakah user memiliki profile, jika tidak buat baru
        $profile = $user->profile()->firstOrCreate([]);

        // Update atau set atribut profile

        $profile->user_id = $user->id;
        $profile->no_hp = $this->no_hp;
        $profile->jenis_kelamin = $this->jenis_kelamin;
        $profile->alamat = $this->alamat;
        $profile->tempat_lahir = $this->tempat_lahir;
        $profile->tanggal_lahir = $this->tanggal_lahir;

        $profile->save(); // Simpan perubahan profile

        // Tambahkan pesan sukses atau handling lain jika diperlukan
        $this->loading = false;

        flash()->addSuccess('Profil berhasil diperbarui.');
    }
    public function render()
    {
        return view('livewire.back.user-profile');
    }
}
