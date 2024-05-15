<div>
    <div class="form-check form-switch">
        <label class="switch">
            <input class="form-check-input" wire:model.lazy="isActive" type="checkbox" role="switch" @if($isActive)
                checked @endif>
            <span class="slider round"></span>
        </label>
    </div>
</div>
