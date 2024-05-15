<div>
    <div class="app-container container-xxl">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Setting About</div>
                </div>
                <div class="card-body">

                    <form action="" method="post" wire:submit.prevent='saveAbout()'>
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" wire:model='title'>
                            <span class="text-danger">@error('title')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="url_video">Url Video <small>(Opsional)</small></label>
                            <input type="text" class="form-control" wire:model='url_video'>
                            <span class="text-danger">@error('url_video')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="title">Deskripsi</label>
                            <div wire:ignore>
                                <textarea id="description"
                                wire:model="description"
                                 class="form-control" name="description">
                                {{  $description  }}
                                </textarea>
                            </div>
                            <span class="text-danger">@error('description')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="title">Tujuan</label>
                            <div wire:ignore>
                                <textarea id="tujuan"
                                wire:model="tujuan"
                                 class="form-control" name="tujuan">
                                {{  $tujuan  }}
                                </textarea>
                            </div>
                            <span class="text-danger">@error('tujuan')
                                {!!$message!!}
                                @enderror</span>
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn btn-sm btn-primary" wire:click="saveAbout"
                                wire:loading.attr="disabled">
                                <span wire:loading wire:target="saveAbout" style="display:none;">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Saving...
                                </span>
                                <span wire:loading.remove wire:target="saveAbout">
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
@push('scripts')
<script src="/back/dist/vendor/ckeditor/build/ckeditor.js"></script>
@endpush

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#description'),{
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
        })
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('description', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#tujuan'),{
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
        })
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('tujuan', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
