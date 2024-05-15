<div>
    <form   wire:submit.prevent='editSosmed' method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Instagram</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='ig' type="text" name="ig" class="form-control form-control-md mb-3 mb-md-0 @error('ig') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('ig')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Facebook</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input type="text" name="fb" class="form-control form-control-md @error('fb')
                        is-invalid
                    @enderror" wire:model='fb'>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('fb')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Twitter</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='tw' type="text" name="tw" class="form-control form-control-md mb-3 mb-md-0 @error('tw') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('tw')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>

                <label class="col-md-2 col-form-label required fw-semibold fs-6">Tiktok</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input type="text" name="tk" class="form-control form-control-md @error('tk')
                        is-invalid
                    @enderror" wire:model='tk'>
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('tk')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-md-2 col-form-label required fw-semibold fs-6">Linkedin</label>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <input wire:model='in' type="text" name="ing" class="form-control form-control-md mb-3 mb-md-0 @error('ing') is-invalid @enderror">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('ing')
                        {!!$message!!}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary btn-sm"  wire:loading.attr="disabled">
                    <span wire:loading wire:target="editSosmed" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Saving...
                    </span>
                    <span wire:loading.remove wire:target="editSosmed">
                        Save
                    </span>
                </button>
            </div>
        </div>

    </form>
</div>
