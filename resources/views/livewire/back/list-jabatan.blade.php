<div>

    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h4>Jabatan</h4>
                        <li class="nav-item ms-auto">
                            <a class="btn btn-sm btn-primary" href="#" data-bs-toggle="modal"
                                data-bs-target="#jabatan_modal">
                                Add Jabatan
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Jabatan Name</th>
                                    <th>Periode Name</th>
                                    <th>N. Of User</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody id="sortable_jabatan">
                                @forelse ($jabatans as $jabatan)
                                <tr data-index="{{$jabatan->id}}" data-ordering="{{$jabatan->ordering}}">
                                    <td>{{$jabatan->name_jabatan}}</td>
                                    <td class="text-muted">
                                        {{$jabatan->name_periode}}
                                    </td>
                                    <td>
                                        @if ($jabatan->userOrganization->isEmpty())
                                        <span>0</span>
                                        @else
                                        <span>1</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" wire:click.prevent='editJabatan({{$jabatan->id}})'
                                                class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                            <a href="#" wire:click.prevent='deleteJabatan({{$jabatan->id}})'
                                                class="btn btn-sm btn-danger">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3"><span class="text-danger">Jabatan Not Found!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modals --}}

    <div wire:ignore.self class="modal modal-blur fade" id="jabatan_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST" @if ($updateJabatanMode) wire:submit.prevent='updateJabatan()'
                @else wire:submit.prevent='addJabatan()' @endif>

                <div class="modal-header">
                    <h5 class="modal-title">{{$updateJabatanMode ? 'Updated Jabatan' : 'Add Jabatan'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateJabatanMode)
                    <input type="hidden" wire:model='selected_jabatan_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Jabatan name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter jabatan name" wire:model='name_jabatan'>
                        <span class="text-danger">@error('name_jabatan')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Periode name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter jabatan periode" wire:model='name_periode'>
                        <span class="text-danger">@error('name_periode')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$updateJabatanMode ? 'Update':'Save'}}</button>
                </div>
            </form>
        </div>
    </div>

</div>
