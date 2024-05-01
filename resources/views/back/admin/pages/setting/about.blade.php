@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'setting about')
@section('content')
@livewire('back.setting-about')
@endsection
