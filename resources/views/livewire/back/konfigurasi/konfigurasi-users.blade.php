<div>

    <div class="row">
        <div class="col">
            @if ($checkedUser)

            <div class=" col-md-4 mb-3">
                <div class="btn-group dropdown">
                    <button type="button" class="btn  btn-light dropdown-toggle waves-effect" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Bulk Action <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <button class="btn btn-sm btn-danger" wire:click="deleteSelectedUser()">Bulk Delete {{
                            count($checkedUser)
                            }}</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center ">
                            <h4 class="fw-bold">Users</h4>
                            <button type="button" name="Add" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                data-bs-target="#add_user_modal">
                                <i class="ti-plus"></i>
                                Tambah Data user
                            </button>
                        </div>
                        <div class="col-md-4 float-left mb-2">
                            <input type="text" class="form-control" placeholder="Cari user..." wire:model.debounce.300ms="search">
                        </div>
                        <div class="col-md-4 float-left mb-2">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center mb-2 ">
                            <div>
                                <select wire:model="perPage" class="form-select">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div>
                                <select wire:model="roleFilter" class="form-select">
                                    <option value="">Semua Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" wire:model="selectAll"></th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" wire:model="checkedUser" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" wire:click.prevent='editUser({{ $user }})' class="btn btn-sm btn-primary"><i
                                                        class="ti-pencil-alt"></i></a> &nbsp;
                                                <a href="#" wire:click.prevent='deleteUser({{ $user }})' class="btn btn-sm btn-danger"><i
                                                        class="ti-trash"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center"><span class="text-danger">Users Not Found!</span></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div wire:ignore.self class="modal modal-blur fade" id="add_user_modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Author</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent='addAuthor()' method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="example-text-input" placeholder="Enter name"
                                            wire:model='name'>
                                        <span class="text-danger">
                                            @error('name')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-select" wire:model='role'>
                                            <option value="">-- Pilih Role --</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('role')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="example-text-input" placeholder="Enter email"
                                            wire:model='email'>
                                        <span class="text-danger">
                                            @error('email')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="example-text-input"
                                            placeholder="Enter username" wire:model='username'>
                                        <span class="text-danger">
                                            @error('username')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">
                                            save
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <div wire:ignore.self class="modal modal-blur fade" id="edit_user_modal" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent='updateUser()' method="post">
                                    @csrf
                                    <input type="hidden" wire:model='selected_user_id'>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="example-text-input" placeholder="Enter name"
                                            wire:model='name'>
                                        <span class="text-danger">
                                            @error('name')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="example-text-input" placeholder="Enter email"
                                            wire:model='email'>
                                        <span class="text-danger">
                                            @error('email')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="example-text-input"
                                            placeholder="Enter username" wire:model='username'>
                                        <span class="text-danger">
                                            @error('username')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-select" wire:model='role'>
                                            <option value="">-- Pilih Role --</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('role')
                                            {!! $message !!}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@push('scripts')
<script>
    $(window).on('hidden.bs.modal',function(){
        Livewire.emit('resetForms');
    });

    window.addEventListener('hide_add_user_modal', function(event){
        $('#add_user_modal').modal('hide');
    });

    window.addEventListener('showEditUserModal',function(event){
        $('#edit_user_modal').modal('show')
    });
    window.addEventListener('hide_edit_user_modal', function(event){
        $('#edit_user_modal').modal('hide');
    });
    window.addEventListener('deleteUser', function(event){
    console.log("Handling deleteUser event", event.detail);
    swal.fire({
        title: event.detail.title,
        html: event.detail.html,
        showCloseButton: true,
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, delete',
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false,
    }).then(function(result){
        if (result.value) {
            console.log("Emitting deleteUserAction for ID:", event.detail.id);
            Livewire.emit('deleteUserAction', event.detail.id);
        }
    });
});
    window.addEventListener('swal:deleteUser', function(event){
        swal.fire({
            title:event.detail.title,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes, delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            allowOutsideClick:false,
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteCheckedUser',event.detail.checkedIDs);
            }
        });
    });
</script>
@endpush
