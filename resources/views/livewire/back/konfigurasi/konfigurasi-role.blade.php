<div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Roles</h4>
                    <button type="button" name="Add" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                    data-bs-target="#role_modal">
                        <i class="ti-plus"></i>
                        Tambah Data
                    </button>
                </div>
                <div class="col-md-4 float-left mb-2">
                    <input type="text" class="form-control" placeholder="Cari role..." wire:model.debounce.300ms="searchRole">
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ $role->created_at->translatedFormat('d F Y H:i:s')}}</td>
                            <td>{{ $role->updated_at->translatedFormat('d F Y H:i:s')}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" wire:click.prevent='editRole({{$role->id}})'
                                        class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                    <a href="#" wire:click.prevent='deleteRole({{$role->id}})'
                                        class="btn btn-sm btn-danger">Delete</a>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"><span class="text-danger">Roles Not Found!</span></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal modal-blur fade" id="role_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST" @if ($updateRoleMode) wire:submit.prevent='updateRole()'
                @else wire:submit.prevent='addRole()' @endif>

                <div class="modal-header">
                    <h5 class="modal-title">{{$updateRoleMode ? 'Updated Role' : 'Add Role'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateRoleMode)
                    <input type="hidden" wire:model='selected_role_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Role name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter Role name" wire:model='name'>
                        <span class="text-danger">@error('name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter Guard name" wire:model='guard_name'>
                        <span class="text-danger">@error('guard_name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$updateRoleMode ? 'Update':'Save'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
