<div>
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 me-5">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-permissions-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Permissions">
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                    data-bs-target="#addsatuPermissionModal">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add Permission
                </button>
                <!--end::Button-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_permissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                        id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>No</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($roles as $item)

                            <tr class="odd">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    @foreach ($item['permissions'] as $permission)
                                    <span class="badge badge-light-primary fs-7 m-1">
                                        {{ $permission }}
                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ $item['id'] }}', '{{ $permission }}')"><i
                                                class="fas fa-times text-danger ml-2" style="margin-left: 8px;"></i></a>
                                    </span>
                                    @endforeach

                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                        wire:click.prevent="showModal({{ $item['id'] }})"
                                        data-kt-permissions-table-filter="delete_row">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length" id="kt_permissions_table_length"><label>
                                <select name="kt_permissions_table_length" aria-controls="kt_permissions_table"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_permissions_table_paginate">
                            paginations
                        </div>
                    </div>
                </div> --}}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>


    <!-- Modal untuk menambahkan permissions -->
    <div wire:ignore.self class="modal fade" id="addPermissionModal" tabindex="-1"
        aria-labelledby="addPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPermissionModalLabel">Tambah Permissions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if(is_null($availablePermissions) || $availablePermissions->isEmpty())
                    <div></div>

                    @if(strlen($searchTerm) > 0)
                    <div class="alert alert-danger" role="alert">
                        Tidak ada permissions yang ditemukan untuk "{{ $searchTerm }}".
                    </div>
                    @else
                    <div class="alert alert-info" role="alert">
                        Semua permissions sudah diterapkan.
                    </div>
                    @endif
                    @else
                    <div class="col-md-3 mb-3">

                        <input type="text" class="form-control" placeholder="Cari permission..."
                            wire:model.debounce.300ms="searchTerm">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="selectAll"
                                    wire:change="toggleSelectAll">
                                <label class="form-check-label fw-bolder" for="checkAll">Pilih Semua</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @forelse($availablePermissions as $permission)
                        <div class="col-md-4 mt-2">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                    wire:model="selectedPermissions">
                                <label class="form-check-label">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>

                        @empty
                        <div>Tidak ada permissions yang ditemukan.</div>
                        @endforelse
                    </div>

                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="addPermissionsToRole">Tambahkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Permission -->
    <div wire:ignore.self class="modal fade" id="addsatuPermissionModal" tabindex="-1"
        aria-labelledby="addsatuPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsatuPermissionModalLabel">Tambah Permission Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createPermission">
                        <div class="mb-3">
                            <label for="permissionName" class="form-label">Nama Permission</label>
                            <input type="text" class="form-control" id="permissionName"
                                wire:model.defer="permissionName">
                            @error('permissionName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function confirmDelete(roleId, permissionName) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang di hapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'

        }).then((result) => {
            if (result.isConfirmed) {
                // Panggil fungsi Livewire untuk menghapus permission
                @this.call('deletePermission', roleId, permissionName);
            }
        })
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('showModal', event => {
        $(event.detail.modalId).modal('show');
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('alert', message => {
            alert(message);
        });

        window.addEventListener('close-modal', event => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('addsatuPermissionModal'));
            modal.hide();
        });
    });
</script>
@endpush
