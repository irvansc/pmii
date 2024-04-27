<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class TopHeader extends Component
{

    public $user;
    protected $listeners = [
        'updateTopHeader' => '$refresh'
    ];
    public function mount()
    {
        $this->user = User::find(auth('web')->id());
    }
    public function render()
    {
        return view('livewire.back.top-header');
    }
}
