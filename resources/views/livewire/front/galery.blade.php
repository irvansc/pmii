<div>
 <!-- ======= Gallery Section ======= -->
 <section id="gallery" class="gallery">
    <div class="container">
        <div class="section-title" >
            <h2>Gallery Foto</h2>
            <div align="center" style="margin-top: 15px;">
                <button wire:click="filterByAlbum('all')" class="btn btn-default filter-button" data-filter="all">All</button>
                @foreach ($albums as $album)
                    <button wire:click="filterByAlbum('{{ $album->id }}')" class="btn btn-default filter-button" data-filter="{{ $album->id }}">{{ $album->album_name }}</button>
                @endforeach
            </div>
        </div>

        <div class="row g-0" >
            @forelse ($fotos as $foto)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" >
                        <a href="storage/images/album/foto/{{ $foto->img }}" class="d-block" data-id="{{ $foto->id }}" data-fancybox="gallery" data-caption="{{ $foto->title }}">
                            <img src="storage/images/album/foto/thumbnails/thumb_{{ $foto->img }}" alt="{{ $foto->title }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            @empty
                <span class="text-danger d-flex justify-content-center">Tidak ada foto yang ditemukan</span>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
      {{$fotos->links('pagination::bootstrap-4')}}
  </div>
  </section>
  <!-- End Gallery Section -->
</div>
