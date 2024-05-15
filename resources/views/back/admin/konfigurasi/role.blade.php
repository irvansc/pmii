@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Roles')

@section('tollbar')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Roles List</h1>
    </div>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <div class="d-flex">
           <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            <a href="#" class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4"data-bs-toggle="modal"
            data-bs-target="#role_modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
            </a>
        </div>
    </div>
@endsection
@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    @livewire('back.konfigurasi.konfigurasi-role')
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
