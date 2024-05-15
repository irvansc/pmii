@extends('front.layouts.pages-layout')
@section('title')
{{webInfo()->web_name}} | {{ $title }}
@endsection

@push('meta')
{!! SEO::generate() !!}
@endpush
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('tag_post', $title) }}">Tags</a></li>
            <li>{{ $currentTag }}</li>
        </ol>
    </div>
</section>

@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12 col-lg-8 entries">
                <div class="row">
                    @forelse ($posts as $item)
                    <div class="col-md-6">
                        <article class="entry">

                            <div class="entry-img" >
                                <img loading="lazy" decoding="async" src="/storage/images/post_images/thumbnails/resized_{{$item->featured_image}}" alt="" class="img-fluid" />
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ route('read_post',$item->slug) }}">{{$item->post_title}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a href=""><time datetime="2020-01-01">{{date_formatter($item->created_at)}}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-book"></i>
                                        <a href="">{{readDuration($item->post_title, $item->post_content) }} @choice('min|mins',
                                            readDuration($item->post_title, $item->post_content)) read</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!!Str::ucfirst(words($item->post_content, 20))!!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('read_post',$item->slug) }}">Read full article</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @empty
                    <span class="text-danger">Posts not found.</span>
                    @endforelse


                </div>
                <div class="blog-pagination mt-3 mb-3">
                    <ul class="justify-content-center">
                        <style>
                            .page-item.active .page-link {
                                background-color: #012970;
                                border-color: #012970;
                            }
                            .page-link:hover{
                                background-color: #012970;

                            }
                        </style>
                        {{$posts->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}
                    </ul>
                </div>

            </div>
            <div class="col-md-4">

                <div class="sidebar">

                    <x-search/>

                    <x-category/>


                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @if (count($related_post) > 0)
                        @foreach ($related_post as $item )
                        <div class="post-item clearfix">
                            <img src="/storage/images/post_images/thumbnails/thumb_{{$item->featured_image}}"
                                alt="{{$item->post_title}}">
                            <h4><a href="b{{ route('read_post', $item->slug) }}">{{$item->post_title}}</a></h4>
                            <time datetime="2020-01-01">{{ date_formatter($item->created_at) }}</time>
                        </div>
                        @endforeach
                        @endif

                    </div>


                    <x-tags/>
                </div>

            </div>
        </div>
    </div>

    </div>
</section>
@endsection
