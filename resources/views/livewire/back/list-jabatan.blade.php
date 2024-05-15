<div>
    <div class="app-container container-xxl">
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            Jabatan
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                        data-bs-target="#jabatan_modal">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon--> Add Jabatan</button>
                        <!--end::Button-->
                    </div>
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
</div>
