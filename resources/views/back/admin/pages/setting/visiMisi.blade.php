@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'visi-misi')
@section('content')

@livewire('back.setting-visi-misi')
@endsection
@push('scripts')
<script>
    window.addEventListener('hideMisiModal', function(e) {
            $('#misi_modal').modal('hide');
        })
        window.addEventListener('showmisiModal', function(e) {
            $('#misi_modal').modal('show');
        })
        $('#misi_modal').on('hide.bs.modal', function(e) {
            Livewire.emit('resetModalForm')
        });

        window.addEventListener('deleteMisi', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Delete.",
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false

            }).then(function(result) {
                if (result.value) {
                    window.Livewire.emit('deleteMisiAction', event.detail.id)
                }
            });
        })



        $('table tbody#sortable_misi').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                window.Livewire.emit("updateMisiOrdering", positions);
            }
        })
</script>
@endpush
