<form action="{{ route('user.edit.step.five.post', Auth::user()->id) }}" method="post">
    @csrf
    {{-- @method('put') --}}

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="current_password">Password Aktif</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password">

                    @error('current_password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
<div class="card-footer">
    <button type="submit" class="btn btn sm btn-primary">Save</button>
</div>


</form>
