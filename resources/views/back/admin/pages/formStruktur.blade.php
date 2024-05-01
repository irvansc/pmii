@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Struktur form')
@section('content')

@livewire('back.struktur-organisasi-form',['strukturId?'])
@endsection
