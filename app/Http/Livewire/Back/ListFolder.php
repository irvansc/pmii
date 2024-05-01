<?php

namespace App\Http\Livewire\Back;

use App\Models\Folder;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ListFolder extends Component
{
    use WithFileUploads;

    public $file_name, $file_size, $file_ext, $doc, $file_ket;
    public $selected_folder_id;
    public $updateFolderMode = false;
    public $folderId;
    public $title;

    public $listeners = [
        'resetModalForm',
        'deleteFolderAction',
        'updateFolderOrdering',
        'openModal' => 'loadFolder'
    ];

    public function loadFolder($folderId)
    {
        $folder = Folder::find($folderId);
        if ($folder) {
            $this->folderId = $folder->id;
            $this->title = $folder->title;
            $this->file_name = $folder->file_name;
            $this->file_ket = $folder->file_ket;
        }
    }


    public function updateFolder()
    {
        $folder = Folder::find($this->folderId);
        if (!$folder) {
            session()->flash('error', 'Folder not found.');
            return;
        }

        if ($this->title && $this->title != $folder->title) {
            $folder->title = $this->title;
        }

        if ($this->file_ket && $this->file_ket != $folder->file_ket) {
            $folder->file_ket = $this->file_ket;
        }

        if ($this->file_name && $this->file_name instanceof \Illuminate\Http\UploadedFile) {
            $path = 'folders/';
            $new_filename = time() . '_' . $this->file_name->getClientOriginalName();
            $this->file_name->storeAs($path, $new_filename, 'public');

            if ($folder->file_name && Storage::disk('public')->exists($path . $folder->file_name)) {
                Storage::disk('public')->delete($path . $folder->file_name);
            }

            $folder->file_name = $new_filename;
            $folder->file_type = $this->file_name->getClientMimeType();
            $folder->file_ext = $this->file_name->getClientOriginalExtension();
            $folder->file_size = $this->file_name->getSize();
        }

        $saved = $folder->save();

        if ($saved) {
            $this->emit('folderUpdated');
            $this->reset(['file_name']); // Reset file input
            $this->dispatchBrowserEvent('close-modal');
            flash()->addSuccess('File has been successfully updated.');
        } else {
            flash()->addError('Something went wrong while updating the folder.');
        }
    }
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->file_name = null;
        $this->file_size = null;
        $this->file_ext = null;
        $this->doc = null;
        $this->file_ket = null;
    }
    public function deleteFolder($id)
    {
        $folder = Folder::find($id);
        $this->dispatchBrowserEvent('deleteFolder', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $folder->title . '</b> file',
            'id' => $id
        ]);
    }

    public function deleteFolderAction($id)
    {
        $folder = Folder::find($id);
        $path = "folders/";
        $featured_image = $folder->file_name;
        if ($featured_image != null && Storage::disk('public')->exists($path . $featured_image)) {
            Storage::disk('public')->delete($path . $featured_image);
        }

        $delete_post = $folder->delete();
        if ($delete_post) {
            flash()->addSuccess('File has been successfuly deleted!');
        } else {
            flash()->addError('Something went wrong!');
        }
    }

    public function updateFolderOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            Folder::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);
        }
        flash()->addSuccess('Folder ordering has been successfuly updated.');
    }
    public function render()
    {

        return view('livewire.back.list-folder', [
            'folders' => Folder::orderBy('ordering', 'asc')->get(),
        ]);
    }
}
