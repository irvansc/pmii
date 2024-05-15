<div>
 <!--begin::Row-->
 <div class="col-md-4 mb-3">
     <input type="text" class="form-control" placeholder="Cari role..."
                 wire:model.debounce.300ms="searchRole">
 </div>
 <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @forelse ($roles as $role)
    <div class="col-md-4 mb-3">
        <!--begin::Card-->
        <div class="card card-flush h-md-100">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>{{ $role->name }}</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Permissions-->
                <div class="fw-bold text-gray-600 mb-5">Permissions:</div>
                <div class="d-flex flex-column text-gray-600">
                    @foreach ($role->permissions as $permission)
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                    </div>
                    @endforeach
                </div>
                <!--end::Permissions-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer flex-wrap pt-0">
                <a href="{{ route('konfigurasi.roles.show', $role->id) }}" class="btn btn-light btn-active-primary  ">View Role</a>
                <button type="button" class="btn btn-light btn-active-warning " wire:click.prevent='editRole({{$role->id}})'>Edit Role</button>
                <a href="#" class="btn btn-light btn-active-danger"wire:click.prevent='deleteRole({{$role->id}})'>Delete Role</a>
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Card-->
    </div>
    @empty
    <div class="col-12">
        <span class="text-danger">Roles Not Found!</span>
    </div>
    @endforelse

</div>

    <div wire:ignore.self class="modal modal-blur fade" id="role_modal" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST" @if ($updateRoleMode) wire:submit.prevent='updateRole()' @else
                wire:submit.prevent='addRole()' @endif>

                <div class="modal-header">
                    <h5 class="modal-title">{{$updateRoleMode ? 'Updated Role' : 'Add Role'}}</h5>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    @if ($updateRoleMode)
                    <input type="hidden" wire:model='selected_role_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Role name</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Enter Role name"
                            wire:model='name'>
                        <span class="text-danger">@error('name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard name</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Enter Guard name"
                            wire:model='guard_name'>
                        <span class="text-danger">@error('guard_name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-sm me-2 btn-warning" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm me-2 btn-primary">{{$updateRoleMode ? 'Update':'Save'}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
