<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;

class StrukturOrganisasiForm extends Component
{
    protected $listeners = ['editStruktur' => 'edit', 'createStruktur' => 'create'];

public function edit($strukturId)
{
    $this->mount($strukturId);
}

public function create()
{
    $this->resetInputFields();
}
    public function render()
    {
        return view('livewire.back.struktur-organisasi-form');
    }
}
