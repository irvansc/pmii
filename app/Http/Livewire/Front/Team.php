<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserOrganization;

class Team extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $perPage = 8;
    public function render()
    {
        $userOrganizations = UserOrganization::with('jabatan')
        ->join('jabatans', 'user_organizations.jabatan_id', '=', 'jabatans.id')
        ->orderBy('jabatans.ordering')
        ->select('user_organizations.*') // Pastikan hanya mengambil kolom dari user_organizations
        ->paginate($this->perPage);
        return view('livewire.front.team', [
            'userOrganizations' => $userOrganizations
        ]);
    }
}
