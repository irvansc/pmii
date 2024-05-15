<div>
    <div class="card card-flush mb-9" id="kt_user_profile_panel">
        <!--begin::Hero nav-->

        <div class="card-header rounded-top bgi-size-cover h-200px"
            style="background-position: 100% 50%; background-image:url('/back/assets/media/misc/menu-header-bg.jpg')">
            <style>
                @media (max-width: 768px) {
                    .header-text {
                        font-size: 1vw;
                        bottom: 10%
                            /* Ukuran font lebih besar untuk layar yang lebih kecil */
                    }
                }

                @media (max-width: 480px) {
                    .header-text {
                        font-size: 1vw;
                        bottom: 10%
                            /* Ukuran font lebih besar lagi untuk layar yang sangat kecil */
                    }
                }
            </style>
            <div class="header-text"
                style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); color: yellow; font-size: 50px; font-weight: bold;">
                {{ webInfo()->web_name }}
            </div>
        </div>
        <!--end::Hero nav-->
        <!--begin::Body-->
        <div class="card-body mt-n19">
            <!--begin::Details-->
            <div class="m-0">
                <!--begin: Pic-->
                <div class="d-flex flex-stack align-items-end pb-4 mt-n19">
                    <div class="symbol symbol-125px symbol-lg-150px symbol-fixed position-relative mt-n3">
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('/back/assets/media/svg/avatars/blank.svg')">
                            <!--begin::Preview existing avatar-->
                            <a href="" id="triggerFileUpload">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url(@if ($user->profile == null) /back/img/user/person.png @else {{ $user->profile->picture }} @endif);">
                                </div>
                            </a>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow position-absolute bottom-0 start-100 translate-middle"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="file" id="changeUserProfilePicture"
                                    onchange="this.dispatchEvent(new InputEvent('input'))">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                        </div>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="d-flex flex-stack flex-wrap align-items-end">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name
                                }}</a>
                            <a href="#" class="" data-bs-toggle="tooltip" data-bs-placement="right"
                                aria-label="Account is verified" data-bs-original-title="Account is verified"
                                data-kt-initialized="1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Text-->
                        <span class="fw-bold text-gray-600 fs-6 mb-2 d-block">Design is like a fart. If you have to
                            force it, it’s probably shit.</span>
                        <!--end::Text-->
                        <!--begin::Info-->
                        <style>
                            .social-icons {
                                display: flex;
                                flex-wrap: wrap;
                                max-width: 300px;
                            }

                            .icon {
                                width: 50%;
                                display: flex;
                                align-items: center;
                                margin-bottom: 8px;
                                text-decoration: none;
                                color: #333;
                            }

                            .icon i {
                                margin-right: 5px;
                            }
                        </style>
                        <div class="social-icons d-flex flex-wrap">
                            <a href="https://instagram.com/{{ $user->profile->in }}"
                                class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-instagram"></i> {{ $user->profile->ig }}
                            </a>
                            <a href="https://facebook.com/{{ $user->profile->in }}"
                                class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-facebook-f"></i> {{ $user->profile->fb }}
                            </a>
                            <a href="https://twitter.com/{{ $user->profile->in }}"
                                class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-twitter"></i> {{ $user->profile->tw }}
                            </a>
                            <a href="https://tiktok.com/@{{ $user->profile->in }}"
                                class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-tiktok"></i> {{ $user->profile->tk }}
                            </a>
                            <a href="https://linkedin.com/in/{{ $user->profile->in }}"
                                class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-linkedin-in"></i> {{ $user->profile->in }}
                            </a>
                            <a href="https://youtube.com/username" class="icon text-gray-400 text-hover-primary">
                                <i class="fab fa-youtube"></i> YouTube
                            </a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->

                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
        </div>
    </div>

</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('triggerFileUpload').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('changeUserProfilePicture').click();
    });
});
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
