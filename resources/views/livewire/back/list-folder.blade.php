<div>
    <div class="app-container container-xxl">
    <div class="row mt-3">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            Files
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a type="button" class="btn btn-light-primary" href="{{ route('setting.add-folder') }}"
                        data-bs-toggle="modal" data-bs-target="#addFolder">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Files</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Files name</th>
                                    <th>Files size</th>
                                    <th>Files Type</th>
                                    <th>Upload</th>

                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody id="sortable_folder">
                                @forelse ($folders as $fol)
                                <tr data-index="{{$fol->id}}" data-ordering="{{$fol->ordering}}">
                                    <td>{{$fol->title}}</td>
                                    <td>
                                        {{$fol->file_size}}
                                    </td>
                                    <td>
                                        {{$fol->file_ext}}
                                    </td>
                                    <td>
                                        {{$fol->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary" style="margin-left: 3px"
                                            data-bs-toggle="modal" data-bs-target="#editFolderModal"
                                            wire:click="$emit('openModal', {{ $fol->id }})">Edit</a>
                                            &nbsp;
                                            <a href="#" wire:click.prevent='deleteFolder({{$fol->id}})'
                                                class="btn btn-sm btn-danger " style="margin-left: 3px">Delete</a>
                                            <a href="{{ route('setting.folders.download', ['filename' => $fol['file_name']]) }}"
                                                class="btn btn-sm btn-info " style="margin-left: 3px">download</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4"><span class="text-danger">Folder Not Found!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- modal --}}
    <div class="modal fade" id="addFolder" tabindex="-1" aria-labelledby="addFolderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFolderLabel">Add Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('setting.store-folder') }}" method="post" id="addForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama File</label>
                            <input type="text" class="form-control " name="title" placeholder="Nama file">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan File</label>
                            <input type="text" name="file_ket" id="file_ket" class="form-control ">
                            <span class="text-danger error-text file_ket_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" name="file_name" id="file_name" class="form-control ">
                            <span class="text-danger error-text file_name_error"></span>
                            <br>
                            <div class="progress mb-2">
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- modals edit --}}

<div>
    <div wire:ignore.self class="modal fade" id="editFolderModal" tabindex="-1" aria-labelledby="editFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFolderModalLabel">Edit Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateFolder">
                        <input type="hidden" wire:model="folderId">
                        <div class="mb-3">
                            <label class="form-label">Nama File</label>
                            <input type="text" class="form-control" wire:model.defer="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan File</label>
                            <input type="text" class="form-control" wire:model.defer="file_ket">
                        </div>
                        <div class="mb-3">
                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">

                            <label class="form-label">File</label>
                            <input wire:model.live="file_name" type="file" class="form-control" wire:model="file_name">
                            <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>

                        </div>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="updateFolder">
                            <span wire:loading wire:target="updateFolder" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span wire:loading.remove wire:target="updateFolder">Save</span>
                            <span wire:loading wire:target="updateFolder">Saving...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('form#addForm').on('submit', function(e) {
    e.preventDefault();
    toastr.remove();
    var form = this;
    var formData = new FormData(form);

    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: formData,
        processData: false,
        contentType: false,
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
    if (evt.lengthComputable) {
        var percentComplete = evt.loaded / evt.total * 100; // Pastikan ini menghitung persentase dengan benar
        $('.progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete).text(percentComplete.toFixed(0) + '%');
    }
}, false);
            return xhr;
        },
        beforeSend: function() {
            $(form).find('span.error-text').text('');
            $('.progress .progress-bar').width('0%');
        },
        success: function(response) {
            toastr.remove();
            if (response.code == 1) {
                $(form)[0].reset();
                $('div.image_holder').find('img').attr('src', '');
                toastr.success(response.msg);
                setTimeout(() => {
                    var redirectUrl = "{{ route('setting.folder') }}";
                    window.location.href = redirectUrl;
                }, 1000);
            } else {
                toastr.error(response.msg);
            }
        },
        error: function(response) {
            toastr.remove();
            $.each(response.responseJSON.errors, function(prefix, val) {
                $(form).find('span.' + prefix + '_error').text(val[0]);
            });
        }
    });
});
</script>
@endpush

@push('scripts')

<script>
    window.addEventListener('close-modal', event => {
        $('#editFolderModal').modal('hide');
    });
</script>
@endpush

