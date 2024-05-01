<div>
    <form method="POST" wire:submit.prevent='updateGeneralSettings()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name">Web Name</label>
                    <input type="text" class="form-control" placeholder="Enter web name" wire:model='web_name'>
                    <span class="text-danger">@error('web_name')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Url</label>
                    <input type="text" class="form-control" placeholder="Enter web url" wire:model='web_url'>
                    <span class="text-danger">@error('web_url')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Tagline</label>
                    <input type="text" class="form-control" placeholder="Enter web tagline" wire:model='web_tagline'>
                    <span class="text-danger">@error('web_tagline')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Email</label>
                    <input type="email" class="form-control" placeholder="Enter web email" wire:model='web_email'>
                    <span class="text-danger">@error('web_email')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Email noReply</label>
                    <input type="email" class="form-control" placeholder="Enter web email noReply" wire:model='web_email_noreply'>
                    <span class="text-danger">@error('web_email_noreply')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Telp</label>
                    <input type="number" class="form-control" placeholder="Enter web telp" wire:model='web_telp'>
                    <span class="text-danger">@error('web_telp')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Description</label>
                    <textarea class="form-control" id="" cols="3" rows="3" wire:model='web_desc'></textarea>
                    <span class="text-danger">@error('web_desc')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="name">Web Alamat</label>
                    <textarea class="form-control" wire:model='web_alamat'></textarea>
                    <span class="text-danger">@error('web_alamat')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name">Web Maps</label>
                    <input type="text" class="form-control" placeholder="Enter web maps" wire:model='web_maps'>
                    <span class="text-danger">@error('web_maps')
                        {!!$message!!}
                    @enderror</span>
                </div>
                <div class="mb-3">
                    <iframe src="https://www.google.com/maps/embed?pb={{ $web_maps }}"
                    width="100%" height="100%" frameborder="0" style="border:0"></iframe>
                </div>
                <small>Note:
                    <ul>
                        <li>Agar Maps tampil dengan akurat silahkan buka google maps dan cari sematkan peta</li>
                        <li>Kemudian copy paste pada bagian https://www.google.com/maps/embed?pb=<strong class="text-danger">di isi dengan kode selanjutnya,</strong> sampai penutup <strong class="text-danger">"</strong></li>
                    </ul>
                </small>
            </div>
        </div>
    </form>
</div>
