<?php

namespace App\Http\Livewire\Front;

use App\Models\Foto;
use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;

class Galery extends Component
{
    use WithPagination;
    public $perPage = 6;
    public $search = null;
    public $albums;
    public $selectedAlbum = 'all';

    public function mount()
    {

        $this->albums = Album::all(); // Ambil semua album

        // Cek jika tidak ada album, tetapkan sebagai array kosong
        if ($this->albums->isEmpty()) {
            $this->albums = collect([]);
        }
    }

    public function filterByAlbum($albumId)
    {
        $this->selectedAlbum = $albumId;
    }
    public function render()
    {
        $fotos = Foto::when($this->selectedAlbum && $this->selectedAlbum != 'all', function ($query) {
            $query->where('album_id', $this->selectedAlbum);
        })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
        return view('livewire.front.galery', [
            'fotos' => $fotos
        ]);
    }
}
