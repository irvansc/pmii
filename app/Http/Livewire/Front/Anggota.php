<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Anggota extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $perPage = 8;

    public function render()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->paginate($this->perPage);

        return view('livewire.front.anggota', compact('users'));
    }
}
