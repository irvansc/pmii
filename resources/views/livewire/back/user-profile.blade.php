<div>
    <form action="" wire:submit.prevent='editUser' method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">
                        Nama Lengkap</label>
                    <input type="text" placeholder="Nama Lengkap" class="form-control"
                        id="basicInput" wire:model='name'>
                    </div>
                    <span class="text-danger">@error('name')
                        {!!$message!!}
                        @enderror</span>
            </div>
            <div class="col-md-4">
                <label for="basicInput" class="form-label">
                    Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" wire:model='username'>
                </div>
                <span class="text-danger">@error('username')
                    {!!$message!!}
                    @enderror</span>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="disableInput" class="form-label">
                        E-mail</label>
                    <input type="email" class="form-control" id="disableInput" wire:model='email'>
                </div>
                <span class="text-danger">@error('email')
                    {!!$message!!}
                    @enderror</span>
            </div>
            <div class="col-md-4">
                <label for="basicInput" class="form-label">
                    No Hp/WhatsAap</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </span>
                    <input type="number" class="form-control"
                        placeholder="No Hp/WhatsAap" wire:model='no_hp'>
                    </div>
                    <span class="text-danger">@error('no_hp')
                        {!!$message!!}
                        @enderror</span>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="readOnlyInput" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" wire:model='jenis_kelamin'>
                        <option value="">--PILIH JENIS KELAMIN--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <span class="text-danger">@error('jenis_kelamin')
                    {!!$message!!}
                    @enderror</span>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">
                        Tempat Lahir
                    </label>
                    <input type="text" value="Tempat Lahir" class="form-control"
                        id="tempat_lahir" wire:model='tempat_lahir'>
                    </div>
                    <span class="text-danger">@error('tempat_lahir')
                        {!!$message!!}
                        @enderror</span>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" wire:model='tanggal_lahir'>
                </div>
                <span class="text-danger">@error('tanggal_lahir')
                    {!!$message!!}
                    @enderror</span>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" wire:model='alamat'>

                    </textarea>
                </div>
                <span class="text-danger">
                    @error('alamat')
                    {!!$message!!}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
