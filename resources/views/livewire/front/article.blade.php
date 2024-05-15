<div>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 col-lg-8 entries">
                    <div class="row">

                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="/storage/images/post_images/{{single_latest_post()->featured_image}}"
                                 alt="{{single_latest_post()->post_title}}"
                                    class="img-fluid" >
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ route('read_post', single_latest_post()->slug) }}">{{single_latest_post()->post_title}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>

                                    <li class="d-flex align-items-center"><i class="bi
                                bi-clock"></i> <a href=""><time
                                                datetime="2020-01-01">{{date_formatter(single_latest_post()->created_at)}}</time></a>
                                    </li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!!Str::ucfirst(words(single_latest_post()->post_content, 35))!!}
                                </p>
                                <div class="read-more">
                                    <a   href="{{ route('read_post', single_latest_post()->slug) }}">Read Full Article</a>
                                </div>
                            </div>

                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a
                                            href="{{ route('category_post',single_latest_post()->subcategory->slug) }}">{{single_latest_post()->subcategory->subcategory_name}}</a>
                                    </li>
                                </ul>

                            </div>
                        </article>
                    @foreach (lates_home_5post() as $item)
                           <div class="btn-read container mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="/storage/images/post_images/thumbnails/resized_{{$item->featured_image}}" class="card-img" alt="{{$item->post_title}}">
                                    </div>
                                    <div class="btn-read col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{ route('read_post',$item->slug) }}">{{$item->post_title}}</a></h5>
                                            <p class="card-text">{!!Str::ucfirst(words($item->post_content, 20))!!}
                                            </p>
                                            <p class="card-text"><small class="text-muted">{{date_formatter($item->created_at)}} - {{ $item->author->name }} -
                                                    <i class="fa fa-eye"></i> {{ views($item)->count() }} views</small></p>
                                        </div>
                                        <div class="btn-read" id="btn-read">
                                            <a  href="{{ route('read_post', $item->slug) }}">Read Full Article <i class="bi bi-arrow-right-circle"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
                                {{lates_home_5post()->appends(request()->input())->links('vendor.pagination.bootstrap-4')}}
                            </ul>
                        </div>
                    @endforeach


                    </div>
                </div>
                <!-- End blog entries list -->


                <!-- End blog sidebar -->
                <div class="col-md-4">
                   <div class="sidebar">
                    <x-search/>
                    <h3 class="sidebar-title">Recommended Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @if (recommended_post() )
                        @foreach (recommended_post() as $item)
                        <div class="post-item clearfix">
                            <img src="/storage/images/post_images/thumbnails/thumb_{{$item->featured_image}}"
                                alt="{{$item->post_title}}">
                            <h4><a href="b{{ route('read_post', $item->slug) }}">{{$item->post_title}}</a></h4>
                            <time datetime="2020-01-01">{{ date_formatter($item->created_at) }}</time>
                        </div>
                        @endforeach
                        @endif

                    </div>
                    <x-category/>
                    <x-tags/>
                   </div>
                </div>
            </div>

        </div>

    </section>
</div>
