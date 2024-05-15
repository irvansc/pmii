<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class InboxStatus extends Component
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
        flash()->addSuccess('Inbox has been successfuly read');

    }


    public function render()
    {
        return view('livewire.back.inbox-status');
    }
}
