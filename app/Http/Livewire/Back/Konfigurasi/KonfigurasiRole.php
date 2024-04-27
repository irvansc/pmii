<?php

namespace App\Http\Livewire\Back\Konfigurasi;

use App\Models\Role;
use Livewire\Component;

class KonfigurasiRole extends Component
{
    public $name, $guard_name;
    public $selected_role_id;
    public $updateRoleMode = false;
    public $searchRole = '';
    public $listeners = [
        'resetModalForm',
        'deleteRoleAction',
    ];

    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->name = null;
        $this->guard_name = null;
    }
    public function addRole()
    {
        $this->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
        ]);
        $category = new Role();
        $category->name = $this->name;
        $category->guard_name = $this->guard_name;
        $saved = $category->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideRoleModal');
            $this->resetModalForm();
            flash()->addSuccess('New Role has been successfuly added.');
        } else {
            flash()->addError('Something went wrong!');
        }
    }
    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->selected_role_id = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->updateRoleMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showroleModal');
    }
    public function updateRole()
    {
        if ($this->selected_role_id) {
            $this->validate([
                'name' => 'required|unique:roles,name,' . $this->selected_role_id,
                'guard_name' => 'required',
            ]);

            $role = Role::findOrFail($this->selected_role_id);
            $role->name = $this->name;
            $role->guard_name = $this->guard_name;
            $updated = $role->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideRoleModal');
                $this->updateRoleMode = false;
                flash()->addSuccess('Role has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $this->dispatchBrowserEvent('deleteRole', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $role->name . '</b> role',
            'id' => $id
        ]);
    }

    public function deleteRoleAction($id)
    {
        $role = Role::where('id', $id)->first();

        $role->delete();
        flash()->addInfo('Role has been successfuly deleted.');
    }
    public function render()
{
    $roles = Role::when($this->searchRole, function ($query) {
        $query->where('name', 'like', '%' . $this->searchRole . '%');
    })
    ->orderBy('created_at', 'asc')
    ->get();

    return view('livewire.back.konfigurasi.konfigurasi-role', [
        'roles' => $roles,
    ]);
}
}
