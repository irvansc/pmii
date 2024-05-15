<div>
    <div class="app-container container-xxl">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            Setting Home
                        </div>
                        <!--end::Search-->
                    </div>
                </div>

                <div class="card-body">

                    <form action="" method="post" wire:submit.prevent='saveSetting()'>
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" wire:model='title'>
                            <span class="text-danger">@error('title')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="title">Deskripsi</label>
                            <input type="text" class="form-control" wire:model='description'>
                            <span class="text-danger">@error('description')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="title">Picture</label>
                            <input type="file" class="form-control" wire:model='img' id="img">
                            <span class="text-danger">@error('img')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        @if ($img)
                        <div class="mb-3">
                            <label for="title">Preview Picture</label>

                            @if (is_object($img) && method_exists($img, 'temporaryUrl'))
                                <img id="preview" src="{{ $img->temporaryUrl() }}" alt="Preview Image" style="max-width: 300px; margin-top: 20px;">
                            @else
                                <img id="preview" src="{{ $img }}" alt="Preview Image" style="max-width: 300px; margin-top: 20px;">
                            @endif
                        </div>
                    @endif
                        <div class="mb-3">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="saveSetting"
                                wire:loading.attr="disabled">
                                <span wire:loading wire:target="saveSetting" style="display:none;">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Saving...
                                </span>
                                <span wire:loading.remove wire:target="saveSetting">
                                    Save
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
