<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class UserSosmed extends Component
{
    public $user, $ig, $fb, $in, $tw, $tk;
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
        $this->ig = $this->user->profile->ig;
        $this->fb = $this->user->profile->fb;
        $this->in = $this->user->profile->in;
        $this->tw = $this->user->profile->tw;
        $this->tk = $this->user->profile->tk;
    } else {
        // Initialize profile related properties to empty if no profile exists
        $this->ig = '';
        $this->fb = '';
        $this->in = '';
        $this->tw = '';
        $this->tk = '';
    }
}

    public function editSosmed(User $user)
    {
        $this->loading = true;

        $user = User::find(auth()->id());

        $profile = $user->profile()->firstOrCreate([]);

        $profile->user_id = $user->id;
        $profile->ig = $this->ig;
        $profile->fb = $this->fb;
        $profile->in = $this->in;
        $profile->tw = $this->tw;
        $profile->tk = $this->tk;
        $profile->save();

        $this->loading = false;

        flash()->addSuccess('Sosial Media berhasil diperbarui.');



    }
    public function render()
    {
        return view('livewire.back.user-sosmed');
    }
}
