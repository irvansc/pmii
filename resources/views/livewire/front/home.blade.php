<div>
     <!-- ======= About Section ======= -->
     <section id="about" class="about">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                    data-aos="fade-right">
                    <a href="{{ $about->url_video }}" class="glightbox play-btn mb-4"></a>
                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center px-lg-5 py-5"
                    data-aos="fade-left">
                    <h3>{{ $about->title }}</h3>
                    <p>
                        {!! $about->description !!}
                    </p>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">Tujuan PK PMII Kharisma</a></h4>
                        <p class="description">
                            {!! $about->tujuan !!}
                        </p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Visi PK PMII Kharisma</a></h4>
                        <p class="description">{{ $visi->desc }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>MISI</h2>
                <p>{{ webInfo()->web_name }}</p>
            </div>

            <div class="row" data-aos="fade-left">
                @foreach ($misi as $item)

                <div class="col-lg-3 col-md-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <i class="{{ $item->icon }}" style="color: {{ $item->color }};"></i>
                        <h3><a href="">{{ $item->name }}</a></h3>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row" data-aos="fade-up">


                <div class="col-lg-3 col-md-6 mt-lg-0 mt-5">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $userAnggota }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Anggota</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-lg-0 mt-5">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $userAlumni }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Alumni</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach (lates_home_3post() as $item )

                <div class="col-lg-4 entries">
                    <article class="entry">
                        <div class="entry-img">
                            <img src="/storage/images/post_images/thumbnails/resized_{{$item->featured_image}}" alt="{{ $item->post_title }}" class="img-fluid" />
                        </div>

                        <h2 class="entry-title">
                            <a href="{{ route('read_post', $item->slug) }}">{{
                                Str::limit($item->post_title, 30, '...') }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <a href="{{ route('read_post', $item->slug) }}">{{ $item->author->name }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="{{ route('read_post', $item->slug) }}"><time datetime="2020-01-01">{{ date_formatter($item->created_at) }}</time></a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-book"></i>
                                    <a href="{{ route('read_post', $item->slug) }}">
                                       {{ readDuration($item->post_content) }} min read</a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! Str::limit($item->post_content, 200, '...') !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ route('read_post', $item->slug) }}">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach

            </div>
        </div>

    </section><!-- End Gallery Section -->
</div>
