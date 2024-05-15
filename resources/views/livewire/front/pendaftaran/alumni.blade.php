<div>
    <style>
        .input-group .form-control {
            border-right: none;
        }

        .input-group .btn {
            border-left: none;
            outline: none;
        }

        .input-group .form-control:focus {
            box-shadow: none;
        }

        .input-group .btn:focus {
            box-shadow: none;
        }
    </style>
    <section id="blog" class="blog">
        <div class="container">
            <div class="section-title">
                <h2>PENDAFTARAN ALUMNI</h2>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if (Session::get('fail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('fail') }}
            </div>
            @endif
            @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {!! Session::get('success') !!}
            </div>
            @endif
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card rounded-0 border border-secondary mb-3">

                        <form wire:submit.prevent='daftarAlumni()' method="post">
                            <div class="card-body">
                                <div class="form-group row mb-2">
                                    <label for="" class="col-sm-3 control-label">Nama Lengkap <span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name')
                                        is-invalid
                                    @enderror form-control-sm  rounded-0 border border-secondary" id="name" name="name"
                                            wire:model='name'>
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
                                        <input type="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror form-control-sm rounded-0 border border-secondary" id="email"
                                            name="email" wire:model='email'>
                                        @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="telp" class="col-sm-3 control-label">Telphone/WhatsAap <span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('no_hp')
                                        is-invalid
                                    @enderror form-control-sm rounded-0 border border-secondary" id="no_hp"
                                            name="no_hp" wire:model='no_hp'>
                                        @error('no_hp')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="url" class="col-sm-3 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_kelamin" id="jenis_kelamin" wire:model='jenis_kelamin'
                                            class="form-control form-control-sm rounded-0 border border-secondary">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="telp" class="col-sm-3 control-label">Alamat<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" wire:model='alamat'
                                            class="form-control form-control-sm rounded-0 border border-secondary"></textarea>
                                        @error('alamat')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" name="password" wire:model='password' id="password"
                                                class="form-control form-control-sm rounded-0 border border-secondary"
                                                placeholder="Enter your password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                                    <i class="bi bi-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="password_confirmation" class="col-sm-3 control-label">Confirm
                                        Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" wire:model='password_confirmation'
                                                name="password_confirmation" id="password_confirmation"
                                                class="form-control form-control-sm rounded-0 border border-secondary"
                                                placeholder="Enter your password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                                    <i class="bi bi-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group row mb-0">
                                    <div class="offset-sm-3 col-sm-9">
                                        <style>
                                            .btn-submit {
                                                background-color: #012970;
                                                color: #fff;
                                            }

                                            .btn-submit:hover {
                                                background-color: #ffcb05;
                                            }
                                        </style>
                                        <!-- Tombol dengan spinner untuk Livewire -->
                                        <button wire:click="daftarAlumni" class="btn btn-submit" type="button">
                                            <span wire:loading wire:target="daftarAlumni" style="display: none;">
                                                <span class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </span>
                                            <span wire:loading.remove wire:target="daftarAlumni">
                                                Submit
                                            </span>
                                        </button>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-password');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function () {
                const passwordInput = this.closest('.input-group').querySelector('input');
                const toggleIcon = this.querySelector('i');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                }
            });
        });
    });
</script>
@endpush
