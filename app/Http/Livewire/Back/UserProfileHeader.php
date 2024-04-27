<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class UserProfileHeader extends Component
{
    public $user;

    protected $listeners = [
       'updateUserProfileHeader'=>'$refresh'
    ];
    public function mount()
   {
      $this->user = User::where('username', auth()->user()->username)->first();
   }
    public function render()
    {
        return view('livewire.back.user-profile-header');
    }
}
