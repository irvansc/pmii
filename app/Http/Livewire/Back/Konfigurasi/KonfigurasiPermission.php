<?php

namespace App\Http\Livewire\Back\Konfigurasi;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class KonfigurasiPermission extends Component
{
    public $selectedRoleId;
    public $availablePermissions;
    public $selectedPermissions = [];
    public $selectAll = false;
    public $searchTerm = '';
    public $permissionName;
    protected $listeners = [
        'permissionDeleted' => '$refresh',
    ];

    public function mount()
    {
        $this->availablePermissions = collect();
    }
    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedPermissions = $this->availablePermissions->pluck('id')->toArray();
        } else {
            $this->selectedPermissions = [];
        }
    }
    public function createPermission()
    {
        $this->validate([
            'permissionName' => 'required|string|unique:permissions,name'
        ],[
            'permissionName.required'=> 'Nama Permission tidak boleh kosong',
            'permissionName.string'=> 'Nama Permission tidak boleh angka',
            'permissionName.unique'=> 'Nama Permission sudah ada'
        ]);

        Permission::create(
            [
                'name' => $this->permissionName,
                'guard_name' => 'web'
            ]
        );
        flash()->addSuccess('Permission berhasil ditambahkan.');
        $this->dispatchBrowserEvent('close-modal');
        $this->reset('permissionName');
    }
    public function showModal($roleId)
    {

        $this->selectedRoleId = $roleId;
        $this->loadAvailablePermissions();
        $this->dispatchBrowserEvent('showModal', ['modalId' => '#addPermissionModal']);
    }

    public function loadAvailablePermissions()
    {
        $role = Role::find($this->selectedRoleId);
        if ($role) {
            $this->availablePermissions = Permission::query()
                ->whereNotIn('id', $role->permissions->pluck('id'))
                ->when($this->searchTerm, function ($query) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%');
                })
                ->get();
        } else {
            $this->availablePermissions = collect();
        }
    }
    public function updatedSearchTerm()
    {
        $this->loadAvailablePermissions();
    }

    public function addPermissionsToRole()
    {
        $role = Role::find($this->selectedRoleId);
        $role->permissions()->attach($this->selectedPermissions);
        $this->reset(['selectedPermissions', 'selectAll']);
        Artisan::call('permission:cache-reset');
        $this->loadAvailablePermissions();
        flash()->addSuccess('Permission berhasil ditambahkan.');
        $this->emit('permissionsUpdated');
    }
    public function deletePermission($roleId, $permissionName)
    {
        $role = Role::findById($roleId);

        // Cek apakah role memiliki permission yang akan dihapus
        if ($role->hasPermissionTo($permissionName)) {
            // Jika ya, hapus permission dari role tersebut
            $role->revokePermissionTo($permissionName);

            // Hapus cache permission
            Artisan::call('permission:cache-reset');

            // Kirim pesan sukses ke session
            // session()->flash('message', 'Permission removed successfully.');
            flash()->addSuccess('Permission berhasil dihapus.');
            $this->emit('permissionDeleted');
        } else {
            // Jika role tidak memiliki permission, kirim pesan error
            flash()->addError('Permission tidak ditemukan!');
        }
    }

    public function generatePermissions()
    {
        Artisan::call('generate:permissions');
        flash()->addSuccess('Permission berhasil digenerate.');

        // $this->emit('permissionsGenerated'); // Emit event jika perlu
    }
    public function render()
    {
        $roles = Role::with('permissions')->get()->map(function ($role) {
            return [
                'id' => $role->id, // Include the id
                'name' => $role->name,
                'permissions' => $role->permissions->pluck('name')->toArray() // Ensure permissions are also returned as an array
            ];
        });

        return view('livewire.back.konfigurasi.konfigurasi-permission', [
            'roles' => $roles,
        ]);
    }
}
