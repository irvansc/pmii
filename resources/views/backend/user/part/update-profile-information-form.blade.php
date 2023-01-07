
<form class="form-horizontal" action="{{route('user.update', Auth::user()->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" name="email">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <select name="status" id="status" class="custom-select">
            <option value=""></option>
            <option value="Anggota" @if (Auth::user()->status == 'Anggota')
                selected
            @endif>Anggota</option>
            <option value="Alumni" @if (Auth::user()->status == 'Alumni')
                selected
            @endif>Alumni</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>

