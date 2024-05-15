@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit User')
@section('tollbar')
     <!--begin::Page title-->
 <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Personal Details Edit</h1>
    <!--end::Title-->
</div>
@endsection
@section('content')

    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Navbar-->
        @livewire('back.user-profile-header')
        <!--end::Navbar-->
        <!--begin::Nav items-->
        <div id="kt_user_profile_nav" class="rounded bg-gray-200 d-flex flex-stack flex-wrap mb-9 p-2"
            data-kt-page-scroll-position="400" data-kt-sticky="true" data-kt-sticky-name="sticky-profile-navs"
            data-kt-sticky-offset="{default: false, lg: '200px'}"
            data-kt-sticky-width="{target: '#kt_user_profile_panel'}" data-kt-sticky-left="auto"
            data-kt-sticky-top="70px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95" style="">
            <!--begin::Nav-->
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">

                <!--begin::Nav item-->
                <li class="nav-item my-1" role="personal details">
                    <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 active"
                        data-bs-toggle="tab" href="#personal_details" aria-selected="true" role="tab">Personal
                        Details</a>
                </li>
                <li class="nav-item my-1" role="sosial_media">
                    <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1"
                        data-bs-toggle="tab" href="#sosial_media" aria-selected="true" role="tab">Sosial Media</a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item my-1">
                    <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1"
                        data-bs-toggle="tab" href="#password" aria-selected="true" role="tab">Password</a>
                </li>
                <!--end::Nav item-->
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
                    <!--begin::Form-->

                    @livewire('back.user-profile')

                    <!--end::Form-->
                </div>
                <div class="tab-pane fade" id="sosial_media" role="tabpanel">
                    <!--begin::Form-->
                    @livewire('back.user-sosmed')
                    <!--end::Form-->
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <!--begin::Form-->
                    @livewire('back.user-password')
                    <!--end::Form-->
                </div>
                <div class="tab-pane fade" id="pendidikan" role="tabpanel">
                    <!--begin::Form-->
                    @livewire('back.user-pendidikan')
                    <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Basic info-->

    </div>
    <!--end::Content container-->

@endsection

