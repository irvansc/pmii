@extends('front.layouts.pages-layout')
@section('title')
    {{ webInfo()->web_name }}
@endsection
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('article') }}">Article</a></li>

        </ol>
    </div>
</section><!-- End Breadcrumbs -->

@section('content')
@livewire('front.article')
@endsection
