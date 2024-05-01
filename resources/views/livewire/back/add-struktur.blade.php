<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="d-flex justify-content-between">
                    <div class="card-title">Add Struktur</div>
                    <a href="{{ route('setting.struktur') }}" class="btn btn-sm btn-warning"><i class="ti-angle-left"></i> Back</a>
                   </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='addStu()' method="post" id="StuForm">
                        <div class="row d-flex">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter name" wire:model='name'>
                                    <span class="text-danger">
                                        @error('name')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenkel" id="" class="form-select" wire:model='jenkel'>
                                        <option value="">--Jenis Kelamin--</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('jenkel')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter email" wire:model='email'>
                                    <span class="text-danger">
                                        @error('email')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter jabatan" wire:model='jabatan'>
                                    <span class="text-danger">
                                        @error('jabatan')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter alamat" wire:model='alamat'>
                                    <span class="text-danger">
                                        @error('alamat')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label">Telphone/WhatsAap</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter telp" wire:model='telp'>
                                    <span class="text-danger">
                                        @error('telp')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter facebook" wire:model='fb'>
                                    <span class="text-danger">
                                        @error('fb')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter Instagram" wire:model='ig'>
                                    <span class="text-danger">
                                        @error('ig')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter twitter" wire:model='twitter'>
                                    <span class="text-danger">
                                        @error('twitter')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Linkedin</label>
                                    <input type="text" class="form-control" name="example-text-input"
                                        placeholder="Enter linkedin" wire:model='linkedin'>
                                    <span class="text-danger">
                                        @error('linkedin')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="">Picture</label>
                                    <input type="file" name="images" class="form-control" wire:model='img' id="images">
                                    <span class="text-danger">
                                        @error('img')
                                        {!! $message !!}
                                        @enderror
                                    </span>
                                </div>
                                @if ($img)
                                <div class="row row-cards">
                                    <img src="{{ $img->temporaryUrl() }}" alt="" class="img-thumbnail" style="width: 250px">
                                </div>
                                @endif

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-txt">
                                Save
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">

                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
            $("#StuForm").submit(function() {
                $(".spinner-border").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Saving ...");
            });
        })
</script>
@endpush
