<form wire:submit.prevent='editPendidikan' method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework"
novalidate="novalidate">
<!--begin::Card body-->
<div class="card-body border-top p-9">
    <div class="row mb-6">
        <label class="col-md-2 col-form-label  fw-semibold fs-6">SD</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input wire:model='sd' type="text" name="sd"
                class="form-control form-control-md mb-3 mb-md-0 @error('sd') is-invalid @enderror">
            <div class="fv-plugins-message-container invalid-feedback">
                @error('sd')
                {!!$message!!}
                @enderror
            </div>
        </div>

        <label class="col-md-2 col-form-label  fw-semibold fs-6">SMP</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input type="text" name="company" class="form-control form-control-md @error('smp')
                is-invalid
            @enderror" wire:model='smp'>
            <div class="fv-plugins-message-container invalid-feedback">
                @error('smp')
                {!!$message!!}
                @enderror
            </div>
        </div>

    </div>
    <div class="row mb-6">
        <label class="col-md-2 col-form-label  fw-semibold fs-6">SMA</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input wire:model='sma' type="text" name="sma"
                class="form-control form-control-md mb-3 mb-md-0 @error('sma') is-invalid @enderror">
            <div class="fv-plugins-message-container invalid-feedback">
                @error('sma')
                {!!$message!!}
                @enderror
            </div>
        </div>
@if ($isAlumni)

        <label class="col-md-2 col-form-label  fw-semibold fs-6">S1</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input type="text" name="company" class="form-control form-control-md @error('s1')
                is-invalid
            @enderror" wire:model='s1'>
            <div class="fv-plugins-message-container invalid-feedback">
                @error('s1')
                {!!$message!!}
                @enderror
            </div>
        </div>
@endif

    </div>
    @if ($isAlumni)

    <div class="row mb-6">
        <label class="col-md-2 col-form-label  fw-semibold fs-6">S2</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input wire:model='s2' type="text" name="s2"
                class="form-control form-control-md mb-3 mb-md-0 @error('s2') is-invalid @enderror">
            <div class="fv-plugins-message-container invalid-feedback">
                @error('s2')
                {!!$message!!}
                @enderror
            </div>
        </div>

        <label class="col-md-2 col-form-label  fw-semibold fs-6">S3</label>

        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <input type="text" name="company" class="form-control form-control-md @error('s3')
                is-invalid
            @enderror" wire:model='s3'>
            <div class="fv-plugins-message-container invalid-feedback">
                @error('s3')
                {!!$message!!}
                @enderror
            </div>
        </div>
    </div>
    @endif

    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary btn-sm"  wire:loading.attr="disabled">
            <span wire:loading wire:target="editPendidikan" style="display:none;">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Saving...
            </span>
            <span wire:loading.remove wire:target="editPendidikan">
                Save
            </span>
        </button>
    </div>
    </div>

</form>
