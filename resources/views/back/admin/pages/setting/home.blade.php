@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'setting home')
@section('tollbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">setting home page</h1>
    <!--end::Title-->
</div>
@endsection
@section('content')
@livewire('back.setting-home')
@endsection
