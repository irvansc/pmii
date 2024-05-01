@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'categories')
@section('content')
            @livewire('back.categories')
@endsection

@push('scripts')
<script>
    window.addEventListener('hideCategoryModal', function(e) {
            $('#categories_modal').modal('hide');
        })
        window.addEventListener('showcategoriesModal', function(e) {
            $('#categories_modal').modal('show');
        })
        window.addEventListener('hideSubCategoryModal', function(e) {
            $('#subcategories_modal').modal('hide');
        })
        window.addEventListener('showSubcategoriesModal', function(e) {
            $('#subcategories_modal').modal('show');
        })

        $('#categories_modal,#subcategories_modal').on('hide.bs.modal', function(e) {
            Livewire.emit('resetModalForm')
        });

        window.addEventListener('deleteCategory', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Delete.",
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false

            }).then(function(result) {
                if (result.value) {
                    window.Livewire.emit('deleteCategoryAction', event.detail.id)
                }
            });
        })
        window.addEventListener('deleteSubCategory', function(event) {
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Delete.",
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 300,
                allowOutsideClick: false

            }).then(function(result) {
                if (result.value) {
                    window.Livewire.emit('deleteSubCategoryAction', event.detail.id)
                }
            });
        })


        $('table tbody#sortable_category').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                window.Livewire.emit("updateCategoryOrdering", positions);
            }
        })
        $('table tbody#sortable_subcategory').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                // alert(positions);
                window.Livewire.emit("updateSubCategoryOrdering", positions);
            }
        })
</script>
@endpush



