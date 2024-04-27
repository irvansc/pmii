@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit User')

@section('content')
<style>
    .profile-image-wrapper {
        position: relative;
        display: inline-block;
        text-align: center;
        /* Tambahkan ini untuk memusatkan ikon di bawah gambar */
    }

    .profile-image {
        display: block;
        border-radius: 50%;
    }

    .edit-icon {
        position: absolute;
        bottom: -30px;
        /* Sesuaikan ini untuk menggeser ikon tepat di bawah gambar */
        left: 50%;
        /* Menempatkan ikon di tengah secara horizontal */
        transform: translateX(-50%);
        /* Mengimbangi posisi ikon agar tepat di tengah */
    }
</style>
<div class="container rounded  mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 border-right">
                    @livewire('back.user-profile-header')
                </div>
                <div class="col-md-9 border-right">
                    <div class="p-3 py-5">
                        <div class="card-header">
                            <h4>PERSONAL DETAILS</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                        data-bs-target="#profile" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true"><i class="ti-user"></i>
                                        PROFILE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                        data-bs-target="#password" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false" tabindex="-1"><i
                                            class="ti-key"></i>
                                        PASSWORD</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="pills-home-tab">
                                    @livewire('back.user-profile')
                                </div>

                                <div class="tab-pane fade" id="password" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    @livewire('back.user-password')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    var flash = {
    addSuccess: function(message) {
        alert('Success: ' + message);
    },
    addError: function(message) {
        alert('Error: ' + message);
    }
};
    $('#changeUserProfilePicture').ijaboCropTool({
          preview : '',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("change-profile-picture") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            livewire.emit('updateUserProfileHeader');
            livewire.emit('updateTopHeader');
            // flash.addSuccess(message);
            toastr.success(message);
          },
          onError:function(message, element, status){
                        toastr.error(message);
            // flash.addError(message);
          }
       });
</script>
@endpush
