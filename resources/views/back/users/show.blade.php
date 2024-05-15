@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Users details')

@section('tollbar')

<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users Details</h1>
</div>

@endsection
@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Navbar-->
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
                        <img src="@if ($user->profile == null) /back/img/user/person.png @else {{ $user->profile->picture }} @endif"
                            alt="image" class="border border-white border-4" style="border-radius: 20px">
                        <div
                            class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-9 bg-success rounded-circle h-15px w-15px">
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
                        <span class="fw-bold text-gray-600 fs-6 mb-2 d-block">{{ $user->profile->biografi }}</span>
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

                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                    <!--begin::Actions-->
                    <div class="d-flex">
                        <a href="https://wa.me/{{ $user->profile->no_hp }}?text=Assalamualaikum,%20sahabat"
                            class="btn btn-sm btn-success me-3" id="kt_drawer_chat_toggle" target="_blank">
                            <i class="fab fa-whatsapp"></i> Send Message
                        </a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Nav items-->
    <div id="kt_user_profile_nav" class="rounded bg-gray-200 d-flex flex-stack flex-wrap mb-9 p-2"
        data-kt-page-scroll-position="400" data-kt-sticky="true" data-kt-sticky-name="sticky-profile-navs"
        data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{target: '#kt_user_profile_panel'}"
        data-kt-sticky-left="auto" data-kt-sticky-top="70px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95"
        style="">
        <!--begin::Nav-->
        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">

            <!--begin::Nav item-->
            <li class="nav-item my-1" role="personal details">
                <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 active"
                    data-bs-toggle="tab" href="#personal_details" aria-selected="true" role="tab">Personal
                    Details</a>
            </li>
            <!--begin::Nav item-->
            <li class="nav-item my-1">
                <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1"
                    data-bs-toggle="tab" href="#pendidikan" aria-selected="true" role="tab">Pendidikan</a>
            </li>
            <!--end::Nav item-->
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav items-->
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin:::Tab content-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="personal_details" role="tabpanel">
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">E-mail</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-semibold text-gray-800 fs-6">{{ $user->email }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                           </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $user->profile->no_hp }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Jenis Kelamin</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                                @if ($user->profile->jk == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Alamat
                       </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->alamat }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Tempat & Tanggal Lahir</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->tempat_lahir }}, {{ $user->profile->tanggal_lahir }}</span>
                        </div>
                        <!--end::Col-->
                    </div>


                </div>
            </div>

            <div class="tab-pane fade" id="pendidikan" role="tabpanel">
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Pendidikan</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">SD</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->sd }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">SMP</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-semibold text-gray-800 fs-6">{{ $user->profile->smp }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">SMA </label>

                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $user->profile->sma }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    @if ($user->profile->s1 != null)

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">S1</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $user->profile->s1 }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    @else

                    @endif

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    @if ($user->profile->s2 != null)


                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">S2
                            </label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->s2 }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    @else

                    @endif
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    @if ($user->profile->s3 != null)


                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">S3</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $user->profile->s3 }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    @else

                    @endif
                </div>
            </div>

        </div>
        <!--end:::Tab content-->
    </div>
</div>
@endsection
