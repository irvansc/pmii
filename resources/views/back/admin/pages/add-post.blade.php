@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'add posts')
@section('tollbar')
<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add posts</h1>
        <!--end::Title-->
    </div>
</div>
@endsection
@section('content')
<div class="app-container container-xxl">
<form action="{{ route('posts.create') }}" method="post" id="addFormPost" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" class="form-control @error('post_title')
                        is-invalid
                        @enderror" name="post_title" placeholder="Enter post title">
                        <span class="text-danger error-text post_title_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Content</label>
                        <textarea class="ckeditor form-control @error('post_content')
                        is-invalid
                        @enderror" name="post_content" rows="6" placeholder="Content.." id="post_content"></textarea>
                        <span class="text-danger error-text post_content_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Deskripsi</label>
                        <input type="text" class="form-control @error('meta_desc')
                        is-invalid
                        @enderror" name="meta_desc" placeholder="Enter meta desc">
                        <span class="text-danger error-text meta_desc_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords')
                        is-invalid
                        @enderror" name="meta_keywords" placeholder="Enter meta keywords">
                        <span class="text-danger error-text meta_keywords_error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <div class="form-label">Post Category</div>
                        <select class="form-select @error('post_category')
                        is-invalid
                        @enderror" name="post_category">
                            <option value="">No Selected</option>
                            @php
                            $subCategory = DB::select('select * from sub_categories')
                            @endphp
                            @foreach ($subCategory as $item)
                            <option value="{{$item->id}}">{{$item->subcategory_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text post_category_error"></span>

                    </div>

                    <div class="mb-3">
                        <div class="form-label">Featured Image</div>
                        <input type="file" class="form-control @error('featured_image')
                        is-invalid
                        @enderror" name="featured_image">
                        <span class="text-danger error-text featured_image_error"></span>

                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img="">
                    </div>
                    <div class="mb-3">
                        <label for="post_tags">Post tags</label>
                        <input type="text" class="form-control @error('post_tags')
                        is-invalid
                        @enderror" name="post_tags" />
                    </div>
                    <div class="form-group">
                        <label for="">Visibility</label>
                        <div class="d-flex mb-3 mt-3 ">
                            <div class="custom-control custom-radio @error('isActive')
                            is-invalid
                            @enderror">
                                <input type="radio" name="isActive" id="customRadio1" class="custom-radion-input"
                                    value="1" checked>
                                <label for="customRadio1" class="custom-control-radio">Public</label>
                            </div>
                            <div class="custom-control custom-radio" style="margin-left: 10px;">
                                <input type="radio" name="isActive" id="customRadio2" class="custom-radion-input"
                                    value="0">
                                <label for="customRadio2" class="custom-control-radio">Draft</label>
                            </div>
                        </div>
                        <span class="text-danger error-text visibility_error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@push('stylesheets')
<script src="/back/dist/vendor/ckeditor/build/ckeditor.js"></script>
@endpush

@push('scripts')
<script>
    class MyUploadAdapter {
        constructor( loader ) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();


            xhr.open( 'POST', '{{ route('posts.post-upload') }}', true );
            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
            xhr.responseType = 'json';
        }

        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }


                resolve( {
                    default: response.url
                } );
            } );

            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );


            this.xhr.send( data );
        }
    }

    // ...

    function uploadPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }

    // ...

    ClassicEditor
        .create( document.querySelector( '#post_content' ), {
            extraPlugins: [ uploadPlugin ],

            // ...
        } )

        .catch( error => {
            console.log( error );
        } );

</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('form#addFormPost').on('submit', function(e) {
        e.preventDefault();
        toastr.remove();
        var form = this;
        var fromdata = new FormData(form);
        $.ajax({
            url: $(form).attr('action')
            , method: $(form).attr('method')
            , data: fromdata
            , processData: false
            , dataType: 'json'
            , contentType: false
            , beforeSend: function() {
                $(form).find('span.error-text').text('');
            }
            , success: function(response) {
                toastr.remove();
                if (response.code == 1) {
                    $(form)[0].reset();
                    $('div.image_holder').find('img').attr('src', '');
                    $('input[name="post_tags"]').amsifySuggestags({
                        type: 'amsify'
                    });
                    toastr.success(response.msg);
                    // Extract the URL and redirect
                    setTimeout(() => {
                    // Use a publicly accessible URL for testing
                    var redirectUrl = "{{ route('posts.all_posts') }}";
                    window.location.href = redirectUrl;
                    // redirect after 1 seconds
            }, 1000)
                } else {
                    toastr.error(response.msg)
                }
            }
            , error: function(response) {
                toastr.remove();
                $.each(response.responseJSON.errors, function(prefix, val) {
                    $(form).find('span.' + prefix + '_error').text(val[0]);
                })
            }
        })
    })
    $('input[type="file"][name="featured_image"]').ijaboViewer({
        preview: '#image-previewer'
        , imageShape: 'rectangular'
        , allowedExtensions: ['jpg', 'jpeg', 'png']
        , onErrorShape: function(message, element) {
            alert(message);
        }
        , onInvalidType: function(message, element) {
            alert(message);
        }
        , onSuccess: function(message, element) {

        }
    });

</script>
@endpush
