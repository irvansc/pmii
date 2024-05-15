<div>
    <div class="app-container container-xxl">
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                           Categories
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                        data-bs-target="#categories_modal">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Category</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>N. Of Subcategory</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody id="sortable_category">
                                @forelse ($categories as $category)
                                <tr data-index="{{$category->id}}" data-ordering="{{$category->ordering}}">
                                    <td>{{$category->category_name}}</td>
                                    <td class="text-muted">
                                        {{$category->subcategories->count()}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" wire:click.prevent='editCategory({{$category->id}})'
                                                class="btn btn-sm btn-primary">Edit</a> &nbsp;
                                            <a href="#" wire:click.prevent='deleteCategory({{$category->id}})'
                                                class="btn btn-sm btn-danger">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3"><span class="text-danger">Category Not Found!</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            SubCategories
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                        data-bs-target="#subcategories_modal">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon--> Add SubCategory</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>SubCategory Name</th>
                                    <th>Parent Category</th>
                                    <th>N. of posts</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody id="sortable_subcategory">
                                @forelse ($subcategories as $item)
                                <tr data-index="{{$item->id}}" data-ordering="{{$item->ordering}}">
                                    <td>{{$item->subcategory_name}}</td>
                                    <td class="text-muted">
                                        {{$item->parent_category != 0 ? $item->parentcategory->category_name : '-'}}
                                    </td>
                                    <td>{{$item->posts->count()}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary"
                                                wire:click.prevent='editSubCategory({{$item->id}})'>Edit</a> &nbsp;
                                            <a href="#" class="btn btn-sm btn-danger"
                                                wire:click.prevent='deleteSubCategory({{$item->id}})'>Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4"><span class="text-danger">SubCategory Not Found!</span></td>
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

    <div wire:ignore.self class="modal modal-blur fade" id="categories_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST" @if ($updateCategoryMode) wire:submit.prevent='updateCategory()'
                @else wire:submit.prevent='addCategory()' @endif>

                <div class="modal-header">
                    <h5 class="modal-title">{{$updateCategoryMode ? 'Updated Category' : 'Add Category'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateCategoryMode)
                    <input type="hidden" wire:model='selected_category_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Category name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter category name" wire:model='category_name'>
                        <span class="text-danger">@error('category_name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$updateCategoryMode ? 'Update':'Save'}}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- modal2 --}}
    <div wire:ignore.self class="modal modal-blur fade" id="subcategories_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" class="modal-content" @if ($updateSubCategoryMode)
                wire:submit.prevent='updateSubCategory()' @else wire:submit.prevent='addSubCategory()' @endif>
                <div class="modal-header">
                    <h5 class="modal-title"> {{$updateCategoryMode ? 'Updated SubCategory' : 'Add SubCategory'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateSubCategoryMode)
                    <input type="hidden" wire:model='selected_subcategory_id'>
                    @endif
                    <div class="mb-3">
                        <div class="form-label">Parent Category</div>
                        <select class="form-select" wire:model='parent_category'>
                            <option value="0">--Uncategorize--</option>
                            @foreach (\App\Models\Category::all() as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('parent_category')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SubCategory name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Enter Subcategory name" wire:model.preven='subcategory_name'>
                        <span class="text-danger">@error('subcategory_name')
                            {!!$message!!}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$updateSubCategoryMode ? 'Update':'Save'}}</button>
                </div>
            </form>
        </div>
    </div>


</div>
</div>
