<div>
    <section id="blog" class="blog">
        <div class="container">
            <div class="section-title">
                <h2>HUBUNGI KAMI</h2>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card rounded-0 border border-secondary mb-3">
                       <form wire:submit.prevent='addContact()' method="post">
                        <div class="card-body">
                            <div class="form-group row mb-2">
                                <label for="comment_author" class="col-sm-3 control-label">Nama Lengkap <span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror form-control-sm  rounded-0 border border-secondary"
                                        id="name" name="name" wire:model='name'>
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="email" class="col-sm-3 control-label">Email <span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror form-control-sm rounded-0 border border-secondary"
                                        id="email" name="email" wire:model='email'>
                                        @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="telp" class="col-sm-3 control-label">Telphon/WhatsAap <span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number"
                                        class="form-control @error('telp')
                                        is-invalid
                                    @enderror form-control-sm rounded-0 border border-secondary"
                                        id="telp" name="telp" wire:model='telp'>
                                        @error('telp')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="url" class="col-sm-3 control-label">URL</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control form-control-sm rounded-0 border border-secondary"
                                        id="url" name="url" placeholder="Laporkan Url ?" wire:model='url'>
                                        <small class="text-danger">Optional</small>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="pesan" class="col-sm-3 control-label">Pesan <span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('pesan')
                                    is-invalid
                                @enderror form-control-sm rounded-0 border border-secondary"
                                        id="pesan" name="pesan" rows="4"
                                        style="height: 78px;" wire:model='pesan'></textarea>
                                        @error('pesan')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group row mb-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <style>
                                        .btn-submit{
                                            background-color: #012970;
                                            color: #fff;
                                        }
                                        .btn-submit:hover{
                                            background-color: #ffcb05;
                                        }
                                    </style>
                                    <button type="submit" class="btn btn-submit">
                                        <i class="bi bi-send"></i> Submit</button>
                                </div>
                            </div>
                        </div>
                       </form>
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
