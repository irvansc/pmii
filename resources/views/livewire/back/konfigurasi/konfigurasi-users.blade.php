<div>
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="col-md-10">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search user"
                                wire:model.debounce.300ms="search">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Filter
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Role:</label>
                                        <select wire:model="roleFilter" class="form-select form-select-solid fw-bold">
                                            <option value="">Semua Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">User Status:</label>
                                        <select wire:model="FilterUserActive" class="form-select form-select-solid fw-bold">
                                            <option value="">Semua User</option>
                                            <option value="1">User Aktif</option>
                                            <option value="0">User Tidak Aktif</option>
                                        </select>
                                    </div>

                                </div>
                                <!--end::Content-->
                            </div>
                            @if ($checkedUser)

                            <div class="btn-group dropdown">
                                <button type="button" class="btn btn-light-primary me-3 dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </span>
                                    Bulk Action
                                </button>
                                <div class="dropdown-menu">
                                    <button class="btn btn-sm btn-danger" wire:click="deleteSelectedUser()">Bulk Delete
                                        {{
                                        count($checkedUser)
                                        }}</button>
                                </div>
                            </div>

                            @endif
                            <!--end::Export-->
                            <!--begin::Add user-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#add_user_modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor">
                                        </rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Add User
                            </button>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between">
                        <div id="" class="d-flex align-items-center dt-toolbar">
                            <div>
                                <select wire:model="perPage" class="form-select form-select-solid form-select-sm">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label for="dt-length-5"></label></div>
                        </div>
                        <div id="" class="d-flex align-items-center">
                            <div>
                                <label for="togglePendaftaran">Pendaftaran Anggota:</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="togglePendaftaran"
                                           wire:model="pendaftaranAktif" wire:click="togglePendaftaran">
                                    <label class="form-check-label" for="togglePendaftaran">{{ $pendaftaranAktif ? 'Aktif' : 'Tidak Aktif' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Table-->
                    <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th><input type="checkbox" wire:model="selectAll"></th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Active users</th>
                                        <th>Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    @forelse ($users as $user )


                                    <tr>
                                        <td>
                                            <input type="checkbox" wire:model="checkedUser" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                        <td>@livewire('back.user-status', ['model' => $user, 'field' => 'isActive'],
                                            key($user->id))
                                            </td>
                                        <td>
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" wire:click.prevent='editUser({{ $user }})'
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" wire:click.prevent='deleteUser({{ $user }})'
                                                        class="menu-link px-3">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">No data found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            </div>
                            <div
                                class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                                    {{$users->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Card-->
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
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" wire:model='jenis_kelamin' class="form-select">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <span class="text-danger">
                                @error('jenis_kelamin')
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
