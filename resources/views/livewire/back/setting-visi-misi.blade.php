<div>
    <div class="app-container container-xxl">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                Setting Visi
                            </div>
                            <!--end::Search-->
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-title">Setting Visi</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" wire:submit.prevent='saveVisi()'>
                            @csrf
                            <div class="mb-3">
                                <label for="title">Visi</label>
                                <input type="text" class="form-control" wire:model='desc'>
                                <span class="text-danger">@error('desc')
                                    {!!$message!!}
                                    @enderror</span>
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-sm btn-primary" wire:click="saveVisi"
                                    wire:loading.attr="disabled">
                                    <span wire:loading wire:target="saveVisi" style="display:none;">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Saving...
                                    </span>
                                    <span wire:loading.remove wire:target="saveVisi">
                                        Save
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                Setting Misi
                            </div>
                            <!--end::Search-->
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                data-bs-target="#misi_modal">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                            fill="currentColor"></rect>
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                            transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor">
                                        </rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Add Misi
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Misi Name</th>
                                        <th>Icon</th>
                                        <th>Color</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody id="sortable_misi">
                                    @forelse ($misi as $m)
                                    <tr data-index="{{$m->id}}" data-ordering="{{$m->ordering}}">
                                        <td>{{$m->name}}</td>
                                        <td>{{$m->icon}}</td>
                                        <td>{{$m->color}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" wire:click.prevent='editMisi({{$m->id}})'
                                                    class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                                <a href="#" wire:click.prevent='deleteMisi({{$m->id}})'
                                                    class="btn btn-sm btn-danger">Delete</a>

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4"><span class="text-danger">Misi Not Found!</span></td>
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

        <div wire:ignore.self class="modal modal-blur fade" id="misi_modal" tabindex="-1" role="dialog"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" method="POST" @if ($updateMisiMode) wire:submit.prevent='updateMisi()' @else
                    wire:submit.prevent='addMisi()' @endif>

                    <div class="modal-header">
                        <h5 class="modal-title">{{$updateMisiMode ? 'Updated Misi' : 'Add Misi'}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($updateMisiMode)
                        <input type="hidden" wire:model='selected_misi_id'>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">misi name</label>
                            <input type="text" class="form-control" name="example-text-input"
                                placeholder="Enter misi name" wire:model='name'>
                            <span class="text-danger">@error('name')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">icon</label>
                            <input type="text" class="form-control" name="example-text-input" placeholder="Enter icon"
                                wire:model='icon'>
                            <small>cek icon this web <a href="https://remixicon.com/"
                                    target="_blank">remixicon</a></small>
                            <span class="text-danger">@error('icon')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">color icon </label>
                            <input type="text" class="form-control" name="example-text-input" placeholder="Enter icon"
                                wire:model='color'>
                            <small>cek color this web <a href="https://htmlcolorcodes.com/"
                                    target="_blank">htmlcolorcodes</a></small>

                            <span class="text-danger">@error('color')
                                {!!$message!!}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{$updateMisiMode ? 'Update':'Save'}}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
