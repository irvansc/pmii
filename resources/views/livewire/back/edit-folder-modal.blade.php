<div>
    <div wire:ignore.self class="modal fade" id="editFolderModal" tabindex="-1" aria-labelledby="editFolderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFolderModalLabel">Edit Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form fields go here -->
                    <form action="{{ route('setting.update-folder',['folder_id'=>request('folder_id')]) }}"
                        method="post" id="editFolderForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="folder_id" id="edit-folder-id">
                        <div class="mb-3">
                            <label class="form-label">Nama File</label>
                            <input type="text" class="form-control " name="title" placeholder="Nama file"
                                wire:model="title">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan File</label>
                            <input type="text" name="file_ket" id="file_ket" class="form-control "
                                wire:model="file_ket">
                            <span class="text-danger error-text file_ket_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" name="file_name" id="file_name" class="form-control "
                                wire:model="file_name">
                            <span class="text-danger error-text file_name_error"></span>
                            <br>
                            <div class="progress mb-2">
                                <div class="progress-bar"
                                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 0%"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
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
    $('form#editFolderForm').on('submit', function(e) {
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
