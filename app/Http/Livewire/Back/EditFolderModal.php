<?php

namespace App\Http\Livewire\Back;

use App\Models\Folder;
use Livewire\Component;

class EditFolderModal extends Component
{
    public $folderId;
    public $title;
    public $file_ket;
    public $file_name;

    public function mount($folderId)
    {
        $folder = Folder::find($folderId);
        if ($folder) {
            $this->folderId = $folder->id;
            $this->title = $folder->title;
            $this->file_ket = $folder->file_ket;
            $this->file_name = $folder->file_name;
        }
    }


    public function render()
    {
        return view('livewire.back.edit-folder-modal');
    }
}
