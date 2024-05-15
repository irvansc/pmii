<div>

    <form action="" method="post" wire:submit.prevent='ChangePassword()'>
        @csrf

        <div class="card-body border-top p-9">
           <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="password_input" class="form-label">Old Password</label>
                    <div class="input-group">
                        <input id="password_input" type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="current_password" autocomplete="off" wire:model="current_password">
                        <button class="btn btn-secondary" type="button" id="toggle_button" onclick="togglePasswordVisibility('toggle_button', 'password_input')">
                            <i class="bi bi-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('current_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="password_input1" class="form-label">New Password</label>
                    <div class="input-group">
                        <input id="password_input1" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="new_password" autocomplete="off" wire:model="new_password">
                        <button class="btn btn-secondary" type="button" id="toggle_button1" onclick="togglePasswordVisibility('toggle_button1', 'password_input1')">
                            <i class="bi bi-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('new_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="password_input2" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input id="password_input2" type="password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="confirm_password" autocomplete="off" wire:model="confirm_password">
                        <button class="btn btn-secondary" type="button" id="toggle_button2" onclick="togglePasswordVisibility('toggle_button2', 'password_input2')">
                            <i class="bi bi-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                    @error('confirm_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading wire:target="ChangePassword" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:loading.remove wire:target="ChangePassword">Save</span>
                    <span wire:loading wire:target="ChangePassword">Saving</span>
                </button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
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
@endpush
