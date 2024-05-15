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
                <li><a href="{{ route('galery') }}">Galery</a></li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
@livewire('front.galery')

@endsection
@push('style')
<link rel="stylesheet" href="/back/dist/vendor/fancybox/dist/jquery.fancybox.min.css"/>

@endpush
@push('scripts')
<script src="/back/dist/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

<script>
    // Fancybox Config
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
</script>
@endpush
