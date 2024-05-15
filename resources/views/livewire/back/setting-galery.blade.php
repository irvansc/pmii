<div>
    <div class="app-container container-xxl">
    <div class="row mt-3">
        <div class="col-md-4 mb-2">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            Albums
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                        data-bs-target="#album_modal">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Album</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Album Name</th>
                                    <th>N. Of Foto</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody id="sortable_album">
                                @forelse ($Albums as $a)
                                <tr data-index="{{$a->id}}" data-ordering="{{$a->ordering}}">
                                    <td>{{$a->album_name}}</td>
                                    <td class="text-muted">
                                        {{$a->foto->count()}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" wire:click.prevent='editAlbum({{$a->id}})'
                                                class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                            <a href="#" wire:click.prevent='deleteAlbum({{$a->id}})'
                                                class="btn btn-sm btn-danger">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3"><span class="text-danger">Album Not Found!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Gallery
                            </h2>
                            {{-- <div class="text-muted mt-1">1-12 of 241 photos</div> --}}
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="input-icon">
                                        <select wire:model='album' id="" class="form-control">
                                            <option value="">-- ALL foto --</option>
                                            @foreach ($AlbumList as $al)
                                            <option value="{{$al->id}}">{{$al->album_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ route('setting.add-foto') }}" class="btn btn-primary" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Add Foto
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        @forelse ($fotos as $foto)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm">
                                <a href="storage/images/album/foto/{{ $foto->img }}" class="d-block"
                                    data-id="{{ $foto->id }}" data-fancybox="gallery" data-caption="{{ $foto->title }}">
                                    <img src="storage/images/album/foto/thumbnails/thumb_{{ $foto->img }}" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-auto">
                                            <a wire:click.prevent='deleteFoto({{$foto->id}})' href=""
                                                class="btn  btn-danger mt-1 mb-1">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @empty
                        <span class="text-danger">Not foto fond(s)</span>
                        @endforelse

                    </div>
                    <div class="d-flex">
                        {{$fotos->links()}}
                    </div>
                </div>
            </div>
            {{-- end --}}
        </div>


    </div>
    {{-- Modals --}}
    <div wire:ignore.self class="modal fade" id="album_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">
                        {{$updateAlbumMode ? 'Updated Album' : 'Add Album'}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-content" method="POST" @if ($updateAlbumMode) wire:submit.prevent='updateAlbum()'
                    @else wire:submit.prevent='addAlbum()' @endif>
                    <div class="modal-body">
                        @if ($updateAlbumMode)
                        <input type="hidden" wire:model='selected_album_id'>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Album name</label>
                            <input type="text" class="form-control" name="example-text-input"
                                placeholder="Enter album name" wire:model='album_name'>
                            <span class="text-danger">@error('album_name')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">{{$updateAlbumMode ? 'Update':'Save'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="foto_modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">
                        {{$updateFotoMode ? 'Updated Foto' : 'Add Foto'}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-content" method="POST" @if ($updateFotoMode) wire:submit.prevent='updateFoto()' @else
                    wire:submit.prevent='addFoto()' @endif>
                    <div class="modal-body">
                        @if ($updateFotoMode)
                        <input type="hidden" wire:model='selected_foto_id'>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="example-text-input" placeholder="Enter title"
                                wire:model='title'>
                            <span class="text-danger">@error('title')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Album</label>
                            <select class="form-control" name="album_id" id="album_id" wire:model='album_id'>
                                <option value="">-- PILIH ALBUM --</option>
                                @foreach ($Albumss as $al)
                                <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('album_id')
                                {!!$message!!}
                                @enderror</span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="img" wire:model='img'>
                            <span class="text-danger">@error('img')
                                {!!$message!!}
                                @enderror</span>
                            <div wire:loading wire:target="img" wire:key="img">
                                <h2>Loading<span class="animated-dots"></span></h2>
                            </div>
                        </div>

                        @if ($oldImg)
                        <div class="mb-3">
                            <label for="">Old Image :</label>
                            <img src="storage/images/album/foto/{{ $oldImg}}" alt="" style="width: 200px">
                        </div>
                        @endif
                        @if ($img)
                        <div class="mb-3">
                            <label for="">New Image</label>
                            <img src="{{ $img->temporaryUrl() }}" alt="" style="width: 200px">
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-50 mt-2">
                            <div wire:loading wire:target="@if ($updateFotoMode)
                        wire:submit.prevent='updateFoto()' @else wire:submit.prevent='addFoto()' @endif
                        " wire:key="
                        @if ($updateFotoMode)
                wire:submit.prevent='updateFoto()' @else wire:submit.prevent='addFoto()' @endif">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            {{$updateFotoMode ? 'Update':'Save'}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@push('stylesheets')
<link rel="stylesheet" href="/back/dist/vendor/fancybox/dist/jquery.fancybox.min.css" />

@endpush
@push('scripts')
<script src="/back/dist/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

<script>
    // Fancybox Config
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
</script>
@endpush
