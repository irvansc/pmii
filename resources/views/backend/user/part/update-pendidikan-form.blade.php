<form class="form-horizontal" action="{{route('user.edit.step.two.post', Auth::user()->id)}}" method="POST">
    @csrf
    {{-- @method('put') --}}
    <div class="form-group row">
        <label for="sd" class="col-sm-2 col-form-label">SD</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sd" value="{{Auth::user()->sd}}" name="sd">
        </div>
    </div>
    <div class="form-group row">
        <label for="smp" class="col-sm-2 col-form-label">SMP</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="smp" value="{{Auth::user()->smp}}" name="smp">
        </div>
    </div>
    <div class="form-group row">
        <label for="sma" class="col-sm-2 col-form-label">SMA</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sma" value="{{Auth::user()->sma}}" name="sma">
        </div>
    </div>
    <div class="form-group row">
        <label for="s1" class="col-sm-2 col-form-label">S1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="s1" value="{{Auth::user()->s1}}" name="s1">
            <small style="color: red">Optional</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="s2" class="col-sm-2 col-form-label">S2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="s2" value="{{Auth::user()->s2}}" name="s2">
            <small style="color: red">Optional</small>

        </div>
    </div>
    <div class="form-group row">
        <label for="s3" class="col-sm-2 col-form-label">S3</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="s3" value="{{Auth::user()->s3}}" name="s3">
            <small style="color: red">Optional</small>

        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
</form>
