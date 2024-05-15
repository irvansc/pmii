<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    @stack('meta')

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{webLogo()->logo_favicon}}" type="image/x-icon">
    <link rel="icon" href="{{webLogo()->logo_favicon}}" type="image/x-icon">
    <base href="/">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/front/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/front/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/front/assets/css/style.css" rel="stylesheet">
    {{--
    <link href="/front/assets/css/custom.css" rel="stylesheet"> --}}
    @livewireStyles()
    @stack('style')

</head>

<body>

    <header id="header" class="fixed-top d-flex align-items-center @yield('cssHeader')">
        <div class="d-flex align-items-center justify-content-between container">

            <div class="logo">
                <h1>
                    <a href="/"><img src="{{ webLogo()->logo_utama }}" alt="" class="img-fluid"></a>
                    <a href="/"><span>{{ webInfo()->web_name }}</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->

            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{
                        Route::is('home')
                        ? 'active' : ''}}" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#features">Mission</a></li>
                    <li><a class="nav-link scrollto {{
                        Route::is('galery')
                        ? 'active' : ''}}" href="{{ route('galery') }}">Gallery</a></li>
                    <li class="dropdown"><a href="#" class="{{
                            Route::is('team.*')
                            ? 'active' : ''}}"><span>Team</span>
                            <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('team.team') }}">team</a></li>
                            <li><a href="{{ route('team.anggota') }}">Anggota</a></li>
                            <li><a href="{{ route('team.alumni') }}">Alumni</a></li>
                            <li><a href="{{ route('team.pendaftaran.alumni') }}">Pendaftaran Alumni</a></li>
                            @php
                            $pendaftaranAktif = DB::table('button_pendaftaran_anggotas')->select('isActive')
                            ->first()->isActive ?? false;
                            @endphp
                            @if ($pendaftaranAktif)
                            <li><a href="{{ route('team.pendaftaran.anggota') }}">Pendaftaran Anggota</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="{{
                        Route::is('article')
                        ? 'active' : ''}}"><span>Update</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('article') }}">Article</a></li>

                        </ul>
                    </li>

                    <li><a class="nav-link scrollto {{
                        Route::is('file')
                        ? 'active' : ''}}" href="file">File Download</a></li>
                    <li><a class="nav-link scrollto {{
                        Route::is('contact')
                        ? 'active' : ''}}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>


    @yield('hero')

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <img src="{{ webLogo()->logo_utama }}" alt="" class="img-fluid" style="width: 200px">
                            <h3>{{ webInfo()->web_name }}</h3>
                            <p class="pb-3"><em>{{webInfo()->web_tagline}}</em></p>
                            <p>{{ webInfo()->web_alamat }}<br><br>
                                <strong>Email:</strong> {{ webInfo()->web_telp }}<br>
                                <strong>Phone:</strong> {{ webInfo()->web_email }}<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="{{ webSosmed()->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="{{ webSosmed()->fb }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="{{ webSosmed()->ig }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="{{ webSosmed()->linkedin }}" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/mission">Mision</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('galery') }}">Galery</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/privacy">Privacy policy</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('sitemap') }}"
                                    target="_blank">sitemap</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ webSosmed()->twitter }}"
                                    target="_blank">Twitter</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ webSosmed()->fb }}"
                                    target="_blank">Facebook</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ webSosmed()->ig }}"
                                    target="_blank">Instagram</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ webSosmed()->youtube }}"
                                    target="_blank">Youtube</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Maps</h4>

                        <iframe src="https://www.google.com/maps/embed?pb={{ webInfo()->web_maps }}" width="250"
                            height="150" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <p>Dapatkan Informasi Terbaru dari kami</p>
                        @livewire('front.newsletter-list')
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> <strong><span>{{ webInfo()->web_name }}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Dev by <a href="https://github.com/irvansc/pmii">PK PMII</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="javascript:void(0);" id="back-to-top" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/back/dist/vendor/jquery/jquery.min.js"></script>

    <script src="/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/front/assets/vendor/aos/aos.js"></script>
    <script src="/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/front/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/front/assets/js/main.js"></script>
    @livewireScripts()
    @stack('scripts')
    <script>
        document.getElementById('back-to-top').addEventListener('click', function(event) {
    event.preventDefault();
    window.scrollTo({top: 0, behavior: 'smooth'});
});
    </script>
</body>

</html>
