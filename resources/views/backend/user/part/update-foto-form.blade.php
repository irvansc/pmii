<form class="form-horizontal" action="{{route('user.edit.step.four.post', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- @method('put') --}}
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <img src="{{ Auth::user()->getPhoto() }}" alt="" class="img-thumbnail preview-path_image" width="200">
            </div>
            <div class="form-group mt-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="path_image" name="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
    <div class="d-flex justify-content-start">
        <span style="color: red">Harap di perhatikan ! Foto otomatis Crop 600x600px</span>
    </div>
</form>



