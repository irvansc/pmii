@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'settings')
@section('content')
<div class="app-container container-fluid">

    @livewire('back.setting')
</div>
@endsection

@push('scripts')
<script>
        $('input[name="logo_utama"]').ijaboViewer({
                preview: '#logo-image-preview',
                // imageShape: 'rectangular',
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                onErrorShape: function(message, element) {
                    alert(message);
                },
                onInvalidType: function(message, element) {
                    alert(message);
                },
                onSuccess: function(message, element) {

                }
            });
        $('input[name="logo_email"]').ijaboViewer({
                preview: '#email-image-preview',
                // imageShape: 'rectangular',
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                onErrorShape: function(message, element) {
                    alert(message);
                },
                onInvalidType: function(message, element) {
                    alert(message);
                },
                onSuccess: function(message, element) {

                }
            });
            $('input[name="logo_favicon"]').ijaboViewer({
                preview: '#favicon-image-preview',
                // imageShape: 'square',
                allowedExtensions: ['ico'],
                onErrorShape: function(message, element) {
                    alert(message);
                },
                onInvalidType: function(message, element) {
                    alert(message);
                },
                onSuccess: function(message, element) {

                }
            });


            $('#changeBlogLogoForm').submit(function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        toastr.remove();
                        if (data.status == 1) {
                            toastr.success(data.msg);
                            $(form)[0].reset();
                            Livewire.emit('updateTopHeader')
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            })

            $('#changeWebEmailLogoForm').submit(function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        toastr.remove();
                        if (data.status == 1) {
                            toastr.success(data.msg);
                            $(form)[0].reset();
                            Livewire.emit('updateTopHeader')
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            })
            $('#changeBlogFaviconForm').submit(function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        toastr.remove();
                        if (data.status == 1) {
                            toastr.success(data.msg);
                            $(form)[0].reset();
                            // Livewire.emit('updateTopHeader')
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            })
    </script>
    @endpush
