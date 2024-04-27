<div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="fw-bold">Permissions</h4>
                <button wire:click="generatePermissions" wire:loading.attr="disabled" class="btn btn-primary btn-sm">
                    <span wire:loading wire:target="generatePermissions">
                        <i class="fa fa-spinner fa-spin"></i> Loading...
                    </span>
                    <span wire:loading.remove wire:target="generatePermissions"><i class="ti-loop"></i> Generate Permissions</span>
                </button>
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
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                @foreach ($item['permissions'] as $permission)
                                <span class="badge bg-light text-primary">
                                    {{ $permission }}
                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ $item['id'] }}', '{{ $permission }}')"><i
                                            class="fas fa-times text-danger"></i></a>
                                </span>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" wire:click.prevent="showModal({{ $item['id'] }})"
                                        class="btn btn-sm btn-primary"><i class="ti-plus"></i></a> &nbsp;
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
                    <div class="alert alert-info" role="alert">
                        Semua permissions sudah diterapkan.
                    </div>
                    @else
                    <div class="col-md-3 mb-3">

                        <input type="text" class="form-control" placeholder="Cari permission..."
                        wire:model.debounce.300ms="searchTerm">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="selectAll" wire:change="toggleSelectAll">
                                <label class="form-check-label fw-bolder" for="checkAll">Pilih Semua</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    @forelse($availablePermissions as $permission)
                    <div class="col-md-4">

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
@endpush
