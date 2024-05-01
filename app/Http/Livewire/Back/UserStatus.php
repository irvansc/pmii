<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Component
{
    public Model $model;

    public $field;

    public $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        flash()->addSuccess('User has been successfuly updated');

    }
    public function render()
    {
        return view('livewire.back.user-status');
    }
}
