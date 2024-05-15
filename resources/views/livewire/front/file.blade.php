<div>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>FILE DOWNLOAD</h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card rounded-0 border border-secondary mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>Files name</th>
                                            <th>size</th>
                                            <th>Type</th>
                                            <th>Keterangan</th>
                                            <th>Created</th>

                                            <th class="w-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($folders as $fol)
                                        <tr>
                                            <td>{{$fol->title}}</td>
                                            <td>
                                                {{$fol->file_size}}
                                            </td>
                                            <td>
                                                {{$fol->file_ext}}
                                            </td>
                                            <td>
                                                {{$fol->file_ket}}
                                            </td>
                                            <td>
                                                {{$fol->created_at->diffForHumans()}}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('folders.downloads', ['filename' => $fol['file_name']]) }}"
                                                        class="btn btn-sm btn-warning "><i
                                                            class="bi bi-download"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3"><span class="text-danger">Folder Not Found!</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End blog entries list -->

                <!-- End blog sidebar -->
                <div class="col-md-4">
                    <div class="sidebar">
                        <x-search />
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
                        <x-category />
                        <x-tags />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
