<div>
    <div class="app-container container-xxl">

    <div class="row">
        <div class="row justify-content-between g-2 mb-3">
            <div class="col-md-4">
                <a data-bs-toggle="modal" data-bs-target="#stu_modal" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah baru
                </a>
            </div>
            @if ($checkedStu)

            <div class=" col-md-4 ">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Bulk Action <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <button class="btn btn-sm btn-danger" wire:click="deleteSelectedStu()">Bulk Delete{{
                            count($checkedStu)
                            }}</button>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            STRUKTUR ORGANISASI
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <input type="search" class="form-control" placeholder="Search" wire:model.debounce.300ms="search">
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap">
                            <thead>

                                <tr>
                                    <th><input type="checkbox" wire:model="selectAll"></th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th class="w-1">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($stus as $e=>$st)
                                <tr>
                                    <td>
                                        <input type="checkbox" wire:model="checkedStu" value="{{ $st->id }}">
                                    </td>
                                    <td>{{ $e+1}}</td>
                                    <td>
                                        {{ $st->name }}
                                    </td>
                                    <td class="text-muted">
                                        {{ $st->email }}

                                    </td>
                                    <td>
                                        {{ $st->jabatan->name_jabatan }}

                                    </td>
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            <a href="#" wire:click.prevent='editStu({{$st->id}})'
                                                class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                            <a href="#" wire:click.prevent='deleteStu({{$st}})'
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger">Tidak ada data!</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$stus->links()}}
                    </div>

                </div>
            </div>
        </div>
        <div wire:ignore.self class="modal modal-blur fade" id="stu_modal" tabindex="-1" role="dialog"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="modal-content " method="POST" @if ($updateStuMode) wire:submit.prevent='updateStu()' @else
                    wire:submit.prevent='addStu()' @endif>

                    <div class="modal-header">
                        <h5 class="modal-title">{{$updateStuMode ? 'Updated Struktur organisasi' : 'Add Struktur
                            organisasi'}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($updateStuMode)
                        <input type="hidden" wire:model='selected_stu_id'>
                        @endif
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
                                    <select name="jabatan_id" id="" class="form-select" wire:model='jabatan_id'>
                                        <option value="">--Jabatan--</option>
                                        @if (count($jabatans) > 0)
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}">{{ $jabatan->name_jabatan }}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled selected>Tidak ada jabatan yang tersedia</option>
                                        @endif
                                    </select>
                                    @error('jabatan')
                                        <span class="text-danger">{!! $message !!}</span>
                                    @enderror
                                    @if (count($jabatans) == 0)
                                        <span class="text-danger">Tidak ada jabatan yang tersedia.</span>
                                    @endif
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
                                <div class="mb-3">
                                    @if ($oldImg)
                                    <div class="mb-3">
                                        <label for="">Old Image :</label>
                                        <img src="{{ asset('storage/images/album/stu/' . $oldImg) }}" alt="" style="width: 200px">
                                    </div>
                                    @endif
                                    @if ($img)
                                    <div class="mb-3">
                                        <label for="">New Image</label>
                                        <img src="{{ $img->temporaryUrl() }}" alt="" style="width: 200px">
                                    </div>
                                    @endif
                                  </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{$updateStuMode ? 'Update':'Save'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

    {{-- Modals --}}


    @push('scripts')
    <script>
        window.addEventListener('hideStuModal', function(e) {
            $('#stu_modal').modal('hide');
        })
        window.addEventListener('showstuModal', function(e) {
            $('#stu_modal').modal('show');
        })
        window.addEventListener('hideSubStuModal', function(e) {
            $('#substu_modal').modal('hide');
        })
        window.addEventListener('showSubstuModal', function(e) {
            $('#substu_modal').modal('show');
        })

        $('#stu_modal,#substu_modal').on('hide.bs.modal', function(e) {
            Livewire.emit('resetModalForm')
        });

        window.addEventListener('deleteStu', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Delete.",
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false

            }).then(function(result) {
                if (result.value) {
                    window.Livewire.emit('deleteStuAction', event.detail.id)
                }
            });
        })
        window.addEventListener('swal:deleteStu', function(event){
        swal.fire({
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'No',
            confirmButtonText:'Yes',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            width:300,
            allowOutsideClick:false
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteCheckedStu',event.detail.checkedIDs);
            }
        });
    });
        $('table tbody#sortable_stu').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                window.Livewire.emit("updateStuOrdering", positions);
            }
        })

    </script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('reloadPage', function () {
            location.reload(); // Mereload halaman setelah event dipicu
        });
    });
</script>
    @endpush
