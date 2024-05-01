@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'setting home')
@section('content')
@livewire('back.setting-home')
@endsection
