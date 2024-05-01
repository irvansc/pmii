@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'add-stuktur')
@section('content')
@livewire('back.add-struktur')

@endsection
