@extends('layouts.partials.master')

@section('title','Edit Profile')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit</li>
@endsection
@push('head')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .Social-media {
        display: flex;
        justify-content: center;
    }

    .Social-media a {
        display: flex;
        background: #fff;
        height: 45px;
        width: 45px;
        margin: 0 15px;
        border-radius: 8px;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 6px 6px 10px -1px rgba(0, 124, 196, 0.15),
            -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(0, 124, 196, 0);
        transition: transform 0.5s
    }

    .Social-media a i {
        font-size: 50px color:#777;
        transition: transform 0.5s;
    }

    .Social-media a:hover {
        box-shadow: inset 4px 4px 6px -2px rgba(0, 0, 0, 0.2),
            inset -4px -4px 6px -1px rgba(255, 255, 255, 0.7),
            -0.5px -0.5px 0px -1px rgba(255, 255, 255, 1),
            0.5px 0.5px 0px rgba(0, 0, 0, 0.15),
            0px 12px 10px -10px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 124, 196, 0.1);
        transform: translateY(2px);
    }

    .Social-media a:hover i {
        transform: scale(0.90);
    }

    .Social-media a:hover .fa-facebook {
        color: #3b5998;
    }

    .Social-media a:hover .fa-twitter {
        color: #00acee;
    }

    .Social-media a:hover .fa-whatsapp {
        color: #4fce5d;
    }

    .Social-media a:hover .fa-instagram {
        color: #f14843;
    }

    .Social-media a:hover .fa-youtube {
        color: #f00;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{Auth::user()->getPhoto()}}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Status</b> <a class="float-right">{{Auth::user()->status}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                </ul>

                <div class="Social-media">
                    <a href="#">
                        <font color="#007cc4"><i class="fab fa-facebook-f"></i></font>
                    </a>
                    <a href="#">
                        <font color="#007cc4"><i class="fab fa-twitter"></i></font>
                    </a>
                    <a href="#">
                        <font color="#007cc4"><i class="fab fa-instagram"></i></font>
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header card-primary card-outline p-2">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == '') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == 'biodata') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}?pills=biodata">BIODATA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == 'pendidikan') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}?pills=pendidikan">PENDIDIKAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == 'sosmed') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}?pills=sosmed">SOSMED</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == 'foto') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}?pills=foto">IMAGE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request('pills') == 'password') active @endif"
                            href="{{ route('user.edit', Auth::user()->id) }}?pills=password">PASSWORD</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade @if (request('pills') == '') show active @endif" id="pills-profil"
                        role="tabpanel" aria-labelledby="pills-profil-tab">
                        @includeIf('backend.user.part.update-profile-information-form')
                    </div>
                    <div class="tab-pane fade @if (request('pills') == 'biodata') show active @endif" id="pills-biodata"
                        role="tabpanel" aria-labelledby="pills-biodata-tab">
                        @includeIf('backend.user.part.update-biodata-form')
                    </div>
                    <div class="tab-pane fade @if (request('pills') == 'pendidikan') show active @endif"
                        id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-pendidikan-tab">
                        @includeIf('backend.user.part.update-pendidikan-form')
                    </div>
                    <div class="tab-pane fade @if (request('pills') == 'sosmed') show active @endif" id="pills-sosmed"
                        role="tabpanel" aria-labelledby="pills-sosmed-tab">
                        @includeIf('backend.user.part.update-sosmed-form')
                    </div>
                    <div class="tab-pane fade @if (request('pills') == 'foto') show active @endif" id="pills-foto"
                        role="tabpanel" aria-labelledby="pills-foto-tab">
                        @includeIf('backend.user.part.update-foto-form')
                    </div>
                    <div class="tab-pane fade @if (request('pills') == 'password') show active @endif"
                        id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                        @includeIf('backend.user.part.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>

@endsection
{{-- @includeIf('includes.datepicker') --}}
