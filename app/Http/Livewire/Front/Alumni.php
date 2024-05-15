<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Alumni extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $perPage = 8;
    public function render()
    {
        $alumnis = User::whereHas('roles', function ($query) {
            $query->where('name', 'alumni');
        })->paginate($this->perPage);
        return view('livewire.front.alumni', compact('alumnis'));
    }
}
