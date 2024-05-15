<?php

namespace App\Http\Livewire\Back\Pages;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $roleFilter = '';
    public $perPage = 10;
    public function render()
    {
        $query = User::query()
    ->where('name', 'like', '%' . $this->search . '%')
    ->whereHas('roles', function ($query) {
        $query->whereIn('name', ['user', 'alumni']);
    });

        if (!empty($this->roleFilter)) {
            $query->role($this->roleFilter);
        }

        $users = $query->paginate($this->perPage);

        $roles = Role::whereIn('name', ['user', 'alumni'])->get();
        return view('livewire.back.pages.users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
