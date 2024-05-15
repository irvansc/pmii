@extends('front.layouts.pages-layout')
@section('title')
{{webInfo()->web_name}} | {{ $posts->post_title }}
@endsection

@push('meta')
{!! SEO::generate() !!}
@endpush

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('article') }}">Article</a></li>
            <li>{{ $posts->post_title }}</li>
        </ol>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="/storage/images/post_images/{{$posts->featured_image}}" alt="{{ $posts->post_title }}"
                            class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="{{ route('read_post', $posts->slug) }}">{{ $posts->post_title }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi
                        bi-person"></i> <a href="">{{ $posts->author->name }}</a></li>
                            <li class="d-flex align-items-center"><i class="bi
                        bi-clock"></i> <a href=""><time
                                        datetime="2020-01-01">{{date_formatter($posts->created_at)}}</time></a>
                            </li>
                            <li class="d-flex align-items-center"><i class="bi
                        bi-eye"></i> <a href="">{{ views($posts)->count() }} views</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {!! $posts->post_content !!}
                        </p>

                    </div>

                    <div class="entry-footer">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li><a
                                    href="{{ route('category_post',$posts->subcategory->slug) }}">{{$posts->subcategory->subcategory_name}}</a>
                            </li>
                        </ul>
                        @if ($posts->post_tags)
                        @php
                        $tagsString =$posts->post_tags;
                        $tagsArray = explode(',',$tagsString);
                        @endphp
                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            @foreach ($tagsArray as $tag)
                            <li><a href="{{ route('tag_post',$tag) }}">#{{$tag}}</a></li>
                            @endforeach

                        </ul>
                        @endif

                    </div>

                </article><!-- End blog entry -->

                <div class="blog-comments">
                    {{-- DIKSUS --}}
                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function() {
                            this.page.url = "{{route('read_post',$posts->slug)}}"; // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = "{{$posts->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document
                                , s = d.createElement('script');
                            s.src = 'https://larablog-site-8.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();

                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>
                </div>
            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="{{ route('search_post') }}">
                            <input id="search-query" name="query" value="{{Request('query')}}" type="text"
                                placeholder="Search...">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->

                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach (categories() as $item)

                            <li>
                                <a href="{{ route('category_post',$item->slug) }}">{{$item->subcategory_name}}
                                    <span>({{$item->posts->count()}})</span>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div><!-- End sidebar categories-->

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @if (count($related_post) > 0)
                        @foreach ($related_post as $item )
                        <div class="post-item clearfix">
                            <img src="/storage/images/post_images/thumbnails/thumb_{{$item->featured_image}}"
                                alt="{{$item->post_title}}">
                            <h4><a href="{{ route('read_post', $item->slug) }}">{{$item->post_title}}</a></h4>
                            <time datetime="2020-01-01">{{ date_formatter($item->created_at) }}</time>
                        </div>
                        @endforeach
                        @endif

                    </div><!-- End sidebar recent posts-->

                    <h3 class="sidebar-title">Tags</h3>
                    <div class="sidebar-item tags">
                        @php
                        $tags = all_tags();
                        @endphp
                        <ul>

                            @foreach($tags as $tag)
                            <li><a href="{{ route('tag_post', $tag) }}">{{ $tag }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- End sidebar tags-->

                </div>

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section>
<!-- End Blog Single Section -->
@endsection
