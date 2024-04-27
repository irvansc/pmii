<div>
    <form action="" method="post" wire:submit.prevent='ChangePassword()'>
        @csrf
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">
                        Old Password</label>
                    <div class="input-group">
                        <input id="password_input" type="password" class="form-control" placeholder="current_password"
                            autocomplete="off" wire:model="current_password">
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
                    <span class="text-danger">@error('current_password')
                        {!!$message!!}
                        @enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <label for="new_password" class="form-label">
                    New Password</label>
                <div class="input-group">
                    <input id="password_input1" type="password" class="form-control" placeholder="new_password"
                        autocomplete="off" wire:model="new_password">
                    <span class="input-group-text">
                        <a id="toggle_button1" onclick="toggle1()">
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
                <span class="text-danger">@error('new_password')
                    {!!$message!!}
                    @enderror</span>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="Confirm New Password" class="form-label">
                        Confirm New Password</label>
                    <div class="input-group">
                        <input id="password_input2" type="password" class="form-control" placeholder="confirm_password"
                            autocomplete="off" wire:model="confirm_password">
                        <span class="input-group-text">
                            <a id="toggle_button2" onclick="toggle2()">
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
                    <span class="text-danger">@error('confirm_password')
                        {!!$message!!}
                        @enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('scripts')
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
    function toggle1() {
    let input_toggle1 = document.getElementById('toggle_button1')
    let password_input1 = document.getElementById('password_input1')

    if (password_input1.type === 'password') {
        password_input1.type = 'text'
        toggle_button1.innerHTML = `

	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" /></svg>`
    } else {
        password_input1.type = 'password'
        toggle_button1.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
        `
    }
}
</script>
<script>
    function toggle2() {
    let input_toggle2 = document.getElementById('toggle_button2')
    let password_input2 = document.getElementById('password_input2')

    if (password_input2.type === 'password') {
        password_input2.type = 'text'
        toggle_button2.innerHTML = `

	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" /></svg>`
    } else {
        password_input2.type = 'password'
        toggle_button2.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
        `
    }
}
</script>
@endpush
