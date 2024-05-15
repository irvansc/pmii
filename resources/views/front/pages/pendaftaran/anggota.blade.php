@extends('front.layouts.pages-layout')
@section('title')
    {{ webInfo()->web_name }}
@endsection


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('team.pendaftaran.anggota') }}">Pendaftaran Anggota</a></li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
@livewire('front.pendaftaran.anggota')
@endsection

