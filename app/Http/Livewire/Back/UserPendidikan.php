<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserPendidikan extends Component
{

    public $user, $sd, $smp, $sma, $s1 , $s2 , $s3;
    public $loading = false;

    public function mount()
    {
        $this->user = User::with('profile')->where('id', auth('web')->user()->id)->first();

        if (!$this->user) {
            // Handle the case where the user is not found
            flash()->addError('User tidak ditemukan.');

            return; // Optionally redirect or perform other actions
        }

        // Check if the user has a profile
        if ($this->user->profile) {
            $this->sd = $this->user->profile->sd;
            $this->smp = $this->user->profile->smp;
            $this->sma = $this->user->profile->sma;
            $this->s1 = $this->user->profile->s1;
            $this->s2 = $this->user->profile->s2;
            $this->s3 = $this->user->profile->s3;
        } else {
            // Initialize profile related properties to empty if no profile exists
            $this->sd = '';
            $this->smp = '';
            $this->sma = '';
            $this->s1 = '';
            $this->s2 = '';
            $this->s3 = '';
        }
    }

    public function editPendidikan(User $user)
    {
        $this->loading = true;


        $user = User::find(auth()->id()); // Dapatkan user berdasarkan auth id


        // Cek apakah user memiliki profile, jika tidak buat baru
        $profile = $user->profile()->firstOrCreate([]);

        // Update atau set atribut profile

        $profile->user_id = $user->id;
        $profile->sd = $this->sd;
        $profile->smp = $this->smp;
        $profile->sma = $this->sma;
        $profile->s1 = $this->s1;
        $profile->s2 = $this->s2;
        $profile->s3 = $this->s3;

        $profile->save(); // Simpan perubahan profile

        // Tambahkan pesan sukses atau handling lain jika diperlukan
        $this->loading = false;

        flash()->addSuccess('Pendidikan berhasil diperbarui.');
    }
    public function render()
    {


        $isAlumni = Auth::user()->hasRole('alumni');
        return view('livewire.back.user-pendidikan', ['isAlumni' => $isAlumni]);
    }
}
