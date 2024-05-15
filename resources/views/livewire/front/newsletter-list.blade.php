<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="" method="post" wire:submit.prevent="store">
        <div class="mb-3">
            <input type="email" name="email" wire:model="email">
        <input type="submit" value="Subscribe">
    </div>
    </form>

</div>
