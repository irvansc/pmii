@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Roles')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            @livewire('back.konfigurasi.konfigurasi-role')
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="/back/dist/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    window.addEventListener('hideRoleModal', function(e) {
            $('#role_modal').modal('hide');
        })
        window.addEventListener('showroleModal', function(e) {
            $('#role_modal').modal('show');
        })
        window.addEventListener('hideSubCategoryModal', function(e) {
            $('#subrole_modal').modal('hide');
        })
        window.addEventListener('showSubroleModal', function(e) {
            $('#subrole_modal').modal('show');
        })

        $('#role_modal,#subrole_modal').on('hide.bs.modal', function(e) {
            Livewire.emit('resetModalForm')
        });

        window.addEventListener('deleteRole', function(event) {
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
                    window.Livewire.emit('deleteRoleAction', event.detail.id)
                }
            });
        })




</script>
@endpush





