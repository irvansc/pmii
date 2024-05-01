<?php

namespace App\Http\Livewire\Back;

use App\Models\Foto;
use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SettingGalery extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $album_name;
    public $selected_album_id;
    public $updateAlbumMode = false;
    public $perPage = 6;

    public $title, $img, $album_id, $oldImg;
    public $selected_foto_id;
    public $updateFotoMode = false;

    public $album = null;
    public $listeners = [
        'resetModalForm',
        'deleteAlbumAction',
        'updateAlbumOrdering',
        'resetModalForm',
        'deleteFotoAction',
    ];
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->album_name = null;
        $this->img = null;
        $this->title = null;
        $this->oldImg = null;

    }
    public function addAlbum()
    {
        $this->validate([
            'album_name' => 'required|unique:albums,album_name',
        ]);
        $album = new Album();
        $album->album_name = $this->album_name;
        $saved = $album->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideAlbumModal');
            $this->album_name = null;
            flash()->addSuccess('New Album has been successfuly added.');
        } else {
            flash()->addError('Something went wrong!');
        }
    }
    public function editAlbum($id)
    {
        $album = Album::findOrFail($id);
        $this->selected_album_id = $album->id;
        $this->album_name = $album->album_name;
        $this->updateAlbumMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showalbumModal');
    }


    public function updateAlbum()
    {
        if ($this->selected_album_id) {
            $this->validate([
                'album_name' => 'required|unique:albums,album_name,' . $this->selected_album_id,
            ]);

            $album = Album::findOrFail($this->selected_album_id);
            $album->album_name = $this->album_name;
            $updated = $album->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideAlbumModal');
                $this->updateAlbumMode = false;
                flash()->addSuccess('Album has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }


    public function deleteAlbum($id)
    {
        $album = Album::find($id);
        $this->dispatchBrowserEvent('deleteAlbum', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $album->album_name . '</b> album',
            'id' => $id
        ]);
    }
    public function deleteAlbumAction($id)
    {
        $album = Album::where('id', $id)->first();
        $foto = Foto::where('album_id', $album->id)->get()->toArray();
        if (!empty($foto) && count($foto) > 0) {
            flash()->addError('This Album has (' . count($foto) . ') foto related it, cannot be deleted.');
        } else {
            $album->delete();
            flash()->addSuccess('Album has been successfuly deleted.');
        }
    }

    public function updateAlbumOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            Album::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);

           flash()->addSuccess('Album ordering has been successfuly updated.');
        }
    }

    public function deleteFoto($id)
    {
        $foto = Foto::find($id);
        $this->dispatchBrowserEvent('deleteFoto', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $foto->title . '</b> foto',
            'id' => $id
        ]);
    }

    public function deleteFotoAction($id)
    {
        $foto = Foto::find($id);
        $path = "images/album/foto/";
        $featured_image = $foto->img;
        if ($featured_image != null && Storage::disk('public')->exists($path . $featured_image)) {
            # delete post fetaured image
            Storage::disk('public')->delete($path . $featured_image);
        }

        $delete_foto = $foto->delete();
        if ($delete_foto) {
           flash()->addSuccess('Foto has been successfuly deleted!');
        } else {
           flash()->addError('Something went wrong!');
        }
    }
    public function render()
    {
        $fotos = Foto::when($this->album, function ($query) {
            $query->where('album_id', $this->album);
        })
            ->orderBy('created_at', 'desc')->paginate($this->perPage);

            $AlbumList = Album::whereHas('foto')->get();
        return view('livewire.back.setting-galery',[
            'Albums'=>  Album::orderBy('ordering', 'asc')->get(),
            'fotos'=> $fotos,
            'Albumss' => Album::all(),
            'AlbumList'=> $AlbumList
        ]);
    }
}
