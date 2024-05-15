<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;

class ButtonPendaftaranAnggota extends Component
{

    public $model;
    public $field = 'isActive'; // Field yang digunakan untuk mengontrol status pendaftaran

    public function mount(ButtonPendaftaranAnggota $model)
    {
        $this->model = $model;
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        flash()->addSuccess('User has been successfully updated');
    }
    public function render()
    {
        return view('livewire.back.button-pendaftaran-anggota');
    }
}
