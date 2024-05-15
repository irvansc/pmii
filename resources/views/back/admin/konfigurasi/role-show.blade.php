@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Roles details')
@section('tollbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">View Role Details
    </h1>
    <!--end::Title-->
</div>

@endsection

@section('content')
<div class="app-container container-xxl">

@livewire('back.konfigurasi.role-show', ['role' => $role, 'users' => $users])
</div>

@endsection

@push('scripts')
    <script>
         window.addEventListener('deleteUserRole', function(event) {
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
                    window.Livewire.emit('deleteUserRoleAction', event.detail.id)
                }
            });
        })
    </script>
@endpush
