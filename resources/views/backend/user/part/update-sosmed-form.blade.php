<form class="form-horizontal" action="{{route('user.edit.step.three.post', Auth::user()->id)}}" method="POST">
    @csrf
    {{-- @method('put') --}}
    <div class="form-group row">
        <label for="facebook" class="col-sm-2 col-form-label"> URL Facebook</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" value="{{ old('facebook') ?? auth()->user()->facebook }}" name="facebook">
            @error('facebook')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="instagram" class="col-sm-2 col-form-label">URL Instagram</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" value=" {{old('instagram') ?? auth()->user()->instagram }}" name="instagram">
            @error('instagram')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="twitter" class="col-sm-2 col-form-label">URL Twitter</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" value="{{old('twitter') ?? auth()->user()->twitter }}" name="twitter">
            @error('twitter')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
</form>
