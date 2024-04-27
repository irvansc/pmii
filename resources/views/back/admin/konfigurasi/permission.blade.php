@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'permission')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            @livewire('back.konfigurasi.konfigurasi-permission')
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="/back/dist/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    window.addEventListener('hidePermissionModal', function(e) {
            $('#permission_modal').modal('hide');
        })
        window.addEventListener('showpermissionModal', function(e) {
            $('#permission_modal').modal('show');
        })

        $('#permission_modal').on('hide.bs.modal', function(e) {
            Livewire.emit('resetModalForm')
        });

        window.addEventListener('deletePermission', function(event) {
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
                    window.Livewire.emit('deletePermissionAction', event.detail.id)
                }
            });
        })




</script>
@endpush





