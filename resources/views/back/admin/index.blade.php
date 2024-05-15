@extends('back.layouts.pages-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')

@section('tollbar')
     <!--begin::Page title-->
 <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
    <!--end::Title-->
</div>

<div class="d-flex align-items-center gap-2 gap-lg-3">
    <!--begin::Filter menu-->
    <div class="d-flex">
        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4" onclick="window.location.href='{{ route('home') }}'; window.location.reload(true);">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2.5 2v6h6M21.5 22v-6h-6"/>
                    <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2"/>
                </svg>
            </span>
        </a>
    </div>

</div>
@endsection
@section('content')

@livewire('back.pages.home-page')

@endsection


