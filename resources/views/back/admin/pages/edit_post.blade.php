@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'edit post')
@section('content')
<form action="{{ route('posts.update-post',['post_id'=>request('post_id')]) }}" method="POST" id="editFormPost"
    enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="post_title" placeholder="Enter post title"
                            value="{{$post->post_title}}">
                        <span class="text-danger error-text post_title_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Content</label>
                        <textarea class="ckeditor form-control" name="post_content" rows="6" placeholder="Content.."
                            id="post_content">{!!$post->post_content!!}</textarea>
                        <span class="text-danger error-text post_content_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Deskripsi</label>
                        <input value="{{$post->meta_desc}}" type="text" class="form-control" name="meta_desc"
                            placeholder="Enter meta desc">
                        <span class="text-danger error-text meta_desc_error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input value="{{$post->meta_keywords}}" type="text" class="form-control" name="meta_keywords"
                            placeholder="Enter meta keywords">
                        <span class="text-danger error-text meta_keywords_error"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <div class="form-label">Post Category</div>
                        <select class="form-select" name="post_category">
                            <option value="">No Selected</option>
                            {{-- GANTTI FOREACH NYA MENJADI SEPERTI INI --}}
                            @foreach ($subCat as $item)
                            <option value="{{$item->id}}" {{$post->category_id == $item->id ? 'selected':
                                ''}}>{{$item->subcategory_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text post_category_error"></span>
                    </div>

                    <div class="mb-3">
                        <div class="form-label">Featured Image</div>
                        <input type="file" class="form-control" name="featured_image">
                        <span class="text-danger error-text featured_image_error"></span>

                    </div>
                    <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer"
                            data-ijabo-default-img="storage/images/post_images/thumbnails/resized_{{$post->featured_image}}">
                    </div>
                    <div class="mb-3">
                        <label for="post_tags">Post tags</label>
                        <input type="text" class="form-control" name="post_tags" value="{{$post->post_tags}}" />
                    </div>
                    <div class="form-group">
                        <label for="">Visibility</label>
                        <div class="d-flex mb-3 mt-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="isActive" id="customRadio1" class="custom-radion-input"
                                    value="1" @if ($post->isActive == 1)
                                checked
                                @endif>
                                <label for="customRadio1" class="custom-control-radio">Public</label>
                            </div>
                            <div class="custom-control custom-radio mr-3">
                                <input type="radio" name="isActive" id="customRadio2" class="custom-radion-input"
                                    value="0" @if ($post->isActive == 0)
                                checked
                                @endif>
                                <label for="customRadio2" class="custom-control-radio">Draft</label>
                            </div>
                        </div>
                        <span class="text-danger error-text visibility_error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@push('stylesheets')
<script src="/back/dist/vendor/ckeditor/build/ckeditor.js"></script>
@endpush

@push('scripts')

<script>
    class MyUploadAdapter {
        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', '{{ route('posts.post-upload') }}', true );
            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
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
    $('form#editFormPost').on('submit', function(e) {
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

