    <form wire:submit.prevent='editUser' method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework"
        novalidate="novalidate">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Nama Lengkap</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='name' type="text" name="name"
                        class="form-control form-control-md mb-3 mb-md-0 @error('name') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('name')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Username</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input type="text" name="company" class="form-control form-control-md @error('username')
                        is-invalid
                    @enderror" wire:model='username'>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('username')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">E-mail</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='email' type="email" name="email"
                        class="form-control form-control-md mb-3 mb-md-0 @error('email') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('email')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Telp/WhatsAap</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input type="number" name="no_hp" class="form-control form-control-md @error('no_hp')
                        is-invalid
                    @enderror" wire:model='no_hp'>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('no_hp')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Tempat Lahir</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='tempat_lahir' type="text" name="tempat_lahir"
                        class="form-control form-control-md mb-3 mb-md-0 @error('tempat_lahir') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('tempat_lahir')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input type="date" name="tanggal_lahir" class="form-control form-control-md @error('tanggal_lahir')
                        is-invalid
                    @enderror" wire:model='tanggal_lahir'>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('tanggal_lahir')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Jenis Kelamin</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <select wire:model='jenis_kelamin' name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-md @error('jenis_kelamin')
                        is-invalid
                    @enderror">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('jenis_kelamin')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Alamat</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <textarea wire:model='alamat' name="alamat" id="alamat" class="form-control form-control-md @error('alamat')
                        is-invalid
                    @enderror"></textarea>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('alamat')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary btn-sm"  wire:loading.attr="disabled">
                    <span wire:loading wire:target="editUser" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Saving...
                    </span>
                    <span wire:loading.remove wire:target="editUser">
                        Save
                    </span>
                </button>
            </div>
            </div>

    </form>
