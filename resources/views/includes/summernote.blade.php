@push('head')
<link rel="stylesheet" href="{{ asset('') }}vendor/plugins/summernote/summernote-bs4.min.css">
@endpush

@push('js')
<script src="{{ asset('') }}vendor/plugins/summernote/summernote-bs4.min.js"></script>
@endpush

@push('js')
<script>
    $('.summernote').summernote({
        fontNames: [''],
        height: 200
    });

    $('.note-btn-group.note-fontname').remove();
    setTimeout(() => {
        $('.note-btn-group.note-fontname').remove();
    }, 300);
</script>
@endpush
