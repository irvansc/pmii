@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'inbox')
@section('content')
<div class="app-container container-fluid">
    @livewire('back.all-inbox')
</div>
@endsection
@push('scripts')
    <script>
           window.addEventListener('deleteInbox', function(event) {
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
                    window.Livewire.emit('deleteInboxAction', event.detail.id)
                }
            });
        })
    </script>
@endpush
