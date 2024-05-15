@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'add foto')
@section('tollbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Foto</h1>
    <!--end::Title-->
</div>
@endsection
@section('content')
<div class="app-container container-xxl">
<div class="col-md-8">
    <div class="card">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-header">
            <div class="card-header">
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1 me-5">
                        Add foto
                    </div>
                    <!--end::Search-->
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('setting.store-foto') }}" method="post" id="clientform"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Album</label>
                        <select class="form-control" name="album_id" id="album_id" wire:model='album_id'>
                            <option value="">-- PILIH ALBUM --</option>
                            @foreach ($albums as $al)
                            <option value="{{ $al->id }}">{{ $al->album_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('album_id')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="">Files</label>
                        <input type="file" class="form-control" name="img[]" id="images" placeholder="Choose images"
                            multiple>
                    </div>
                    <div class="row row-cards">

                        <style>
                            .images-preview-div img {
                                padding: 10px;
                                max-width: 100px;
                            }
                        </style>
                        <div class="images-preview-div"></div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-txt">
                        Save
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">

                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@push('stylesheets')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')

<script>
    $(function() {
    var previewImages = function(input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#images').on('change', function() {
        previewImages(this, 'div.images-preview-div');
    });

  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
            $("#clientform").submit(function() {
                $(".spinner-border").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Saving ...");
            });
        })
</script>
@endpush
