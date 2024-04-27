@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Users')
@section('content')
            @livewire('back.konfigurasi.konfigurasi-users')
@endsection





