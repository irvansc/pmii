<div>
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
    <form method="POST" wire:submit.prevent='LoginHandler()' id="registrationForm">
        {{-- @csrf --}}
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Or Username') }}</label>

            <div class="col-md-6">
                <input id="login_id" type="login_id" class="form-control @error('login_id') is-invalid @enderror"
                    name="login_id" value="{{ old('login_id') }}" required autocomplete="login_id" autofocus wire:model="login_id">

                @error('login_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <div class="input-group input-group-flat">
                    <input id="password_input" type="password" class="form-control" placeholder="Password" autocomplete="off"
                        wire:model="password">
                    <span class="input-group-text">
                        <a id="toggle_button" onclick="toggle()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                        </a>
                    </span>

                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" id="btn-submit" class="btn btn-primary">
                    <i class="fa fa-circle-o-notch fa-spin d-none" ></i>
                    <span class="btn-txt">Login</span>
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@push('sc')
<script>
        function toggle() {
    let input_toggle = document.getElementById('toggle_button')
    let password_input = document.getElementById('password_input')

    if (password_input.type === 'password') {
        password_input.type = 'text'
        toggle_button.innerHTML = `

	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" /></svg>`
    } else {
        password_input.type = 'password'
        toggle_button.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
        `
    }
}
</script>
<script>
    $(document).ready(function() {
            $("#registrationForm").submit(function() {
                $(".fa-circle-o-notch").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Login...");
            });
        });
</script>
@endpush
