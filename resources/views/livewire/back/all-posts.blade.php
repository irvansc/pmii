<div>
    <div class="app-container container-xxl">
        <div class="row mt-3">
            <div class="col-md-2 mb-3">
                <label for="" class="form-label">Category</label>
                <select wire:model='category' id="" class="form-select">
                    <option value="">--No Selected--</option>

                    @foreach (\App\Models\SubCategory::whereHas('posts')->get() as $category)
                    <option value="{{$category->id}}">{{$category->subcategory_name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-2 mb-3">
                <label for="" class="form-label">Author</label>
                <select wire:model.live='author' id="" class="form-select">
                    <option value="">--No Selected--</option>
                    @foreach ($users as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label for="" class="form-label">SortBy</label>
                <select wire:model='orderBy' id="" class="form-select">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </div>
        </div>
        <div class="row row-cards">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            All Posts
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <input type="text" class="form-control" placeholder="Search..." wire:model='search'>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <select wire:model.live='perPage'>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            entries
                        </div>

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Categori</th>
                                <th>view</th>
                                <th>Visibility</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $e=>$post)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>
                                    <div class="d-flex py-1 align-items-center">
                                        <span class="avatar me-2"
                                            style="background-image: url('{{ asset('storage/images/post_images/thumbnails/resized_' . $post->featured_image) }}');
                                    width: 50px; height: 50px; background-size: cover; background-position: center;"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium">{{ $post->author->name }}</div>
                                            <div class="text-muted">{{ $post->author->roles->pluck('name')->join(', ')
                                                }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ Str::limit($post->post_title, 15, ' ...') }}</div>
                                </td>
                                <td class="text-muted">
                                    {{$post->subcategory->subcategory_name}}
                                </td>
                                <td>
                                    0
                                </td>
                                <td>
                                    @if ($post->isActive == 0)
                                    <span class="badge badge-dark">

                                        Draft
                                    </span>
                                    @else
                                    <span class="badge badge-primary">
                                        Public
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex py-1 align-items-center">
                                        @if ($post->author_id == auth()->id())

                                        <a href="{{ route('posts.edit-posts',['post_id'=>$post->id]) }}"
                                            class="btn btn-sm btn-warning ">Edit</a>

                                        <a href="" wire:click.prevent='deletePost({{$post->id}})'
                                            class="btn btn-sm btn-danger" style="margin-left: 3px">Delete</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <span class="text-danger">No post(s) found.</span>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <div class="row mt-4">
            {{$posts->links()}}
        </div>
    </div>

</div>
