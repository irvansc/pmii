
<form class="form-horizontal" action="{{route('user.edit.step.one.post', Auth::user()->id)}}" method="POST">
    @csrf
    {{-- @method('put') --}}
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label">Whatsaap</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" value="{{Auth::user()->phone}}" name="phone">
      </div>
    </div>

    <div class="form-group row">
      <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
      <div class="col-sm-10">
        <div class="input-group datepicker" id="datepicker" >
            <input type="date" name="birth_date" class="form-control"
                value="{{ old('birth_date') ?? auth()->user()->birth_date }}" data-date-format="DD-MM-YYYY "/>

        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
      <div class="col-sm-10">
        <select name="gender" id="gender" class="custom-select">
            <option value=""></option>
            <option value="laki-laki" @if (Auth::user()->gender == 'laki-laki')
                selected
            @endif>Laki Laki</option>
            <option value="perempuan" @if (Auth::user()->gender == 'perempuan')
                selected
            @endif>Perempuan</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <div class="input-group datepicker" id="datepicker" >
              <input type="text" name="address" class="form-control"
                  value="{{ old('address') ?? auth()->user()->address }}"/>

          </div>
        </div>
      </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">About</label>
        <div class="col-sm-10">
          <div class="input-group " >
              <textarea name="about" id="about" class="form-control summernote">
                {{Auth::user()->about}}
              </textarea>

          </div>
        </div>
      </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>


@includeIf('includes.summernote')
