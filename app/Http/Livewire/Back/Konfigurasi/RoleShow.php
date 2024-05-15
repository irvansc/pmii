<?php

namespace App\Http\Livewire\Back\Konfigurasi;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Permission;

class RoleShow extends Component
{

    public $users;
    public $role;
    public $roleName;
    public $permissions;
    public $selectedPermissions = [];
    public $selectAll = false;
    public $listeners = [
        'deleteUserRoleAction',
        'refreshUsers'
    ];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->roleName = $role->name;
        $this->permissions = Permission::all();
        $this->selectedPermissions = $this->role->permissions->pluck('id')->toArray();
    }
    public function refreshUsers()
    {
        $this->role->refresh();
        $this->users = $this->role->users;
    }
    public function deleteUserRole($id)
    {

        $user = User::find($id);
        $this->dispatchBrowserEvent('deleteUserRole', [
            'title' => 'Apakah kamu yakin?',
            'html' => 'Kamu akan melepas user ini dari role <b>' . $this->role->name . '</b>',
            'id' => $id
        ]);
    }
    public function deleteUserRoleAction($id)
    {
        // dd($id);
        $user = User::find($id);
        $user->removeRole($this->role->name);
        $this->emit('refreshUsers');
        flash()->addSuccess('User berhasil dilepas dari role!');
    }

    public function updateRole()
    {
        $this->role->name = $this->roleName;
        $this->role->permissions()->sync($this->selectedPermissions);
        $this->role->save();
        flash()->addSuccess('Role berhasil diupdate');

        $this->emit('close-modal'); // Emit event to notify role update
        $this->dispatchBrowserEvent('close-modal'); // Close modal after update
    }
    public function selectAllPermissions()
    {
        if (count($this->selectedPermissions) === count($this->permissions->pluck('id')->toArray())) {
            // Jika semua permission sudah terpilih, kosongkan array selectedPermissions
            $this->selectedPermissions = [];
        } else {
            // Jika tidak semua permission terpilih, pilih semua
            $this->selectedPermissions = $this->permissions->pluck('id')->toArray();
        }
    }

    public function deselectAllPermissions()
    {
        $this->selectedPermissions = [];
    }
    public function render()
    {
        return view('livewire.back.konfigurasi.role-show');
    }
}
