@extends('layouts.app')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

    @livewire('back.auth.login-form')

@endsection
