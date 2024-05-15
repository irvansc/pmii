<div>

    {{-- <form >
        @csrf
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Or Username') }}</label>

            <div class="col-md-6">
                <input id="login_id" type="login_id" class="form-control "
                    name="login_id" value="{{ old('login_id') }}" required autocomplete="login_id" autofocus
                    wire:model="login_id">


            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <div class="input-group input-group-flat">
                    <input id="password_input" type="password" class="form-control" placeholder="Password"
                        autocomplete="off" wire:model="password">
                    <span class="input-group-text">
                        <a id="toggle_button" onclick="toggle()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="2" />
                                <path
                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
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
                <button type="submit" id="btn-submit" class="btn btn-login"
                    style="background-color: #010488; color: white">
                    <i class="fa fa-circle-o-notch fa-spin d-none"></i>
                    <span class="btn-txt">Login</span>
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form> --}}

    <!--begin::Form-->
    <form class="form w-100"  method="POST" wire:submit.prevent='LoginHandler()' id="registrationForm"
        >
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>

        </div>
        <!--end::Login options-->
        <!--begin::Separator-->
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">Username or Email</span>
        </div>
        @if (Session::get('fail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('fail') }}
        </div>
        @endif
        @if (Session::get('sukses'))
        <div class="alert alert-success" role="alert">
            {!! Session::get('sukses') !!}
        </div>
        @endif
        <!--end::Separator-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email or Username" wire:model="login_id" name="login_id" autocomplete="off"
                class="form-control bg-transparent" />
            <!--end::Email-->
        </div>
        @error('login_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!--end::Input group=-->
        <div class="fv-row mb-3" data-kt-password-meter="true">
            <!--begin::Password-->
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent" wire:model="password" type="password" placeholder="Password" name="password" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
            </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            @if (Route::has('password.request'))
                <a class="link-primary" href="{{ route('password.request') }}">
                    Forgot Password ?
                </a>
            @endif

        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">

            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading wire:target="LoginHandler" class="spinner-border spinner-border-sm align-middle ms-2" role="status" aria-hidden="true"></span>
                <span wire:loading.remove wire:target="LoginHandler">Sign In</span>
                <span wire:loading wire:target="LoginHandler">Please wait...</span>
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun?
            <a href="{{ route('register') }}" class="link-primary">Sign up</a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->
</div>
@push('sc')
<script>
    function togglePasswordVisibility(buttonId, inputId) {
        let button = document.getElementById(buttonId);
        let input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            button.innerHTML = '<i class="bi bi-eye" aria-hidden="true"></i>';
        } else {
            input.type = 'password';
            button.innerHTML = '<i class="bi bi-eye-slash" aria-hidden="true"></i>';
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
