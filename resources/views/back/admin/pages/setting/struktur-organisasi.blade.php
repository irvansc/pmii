@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'setting struktur organisasi')
@section('tollbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Struktur organisasi</h1>

</div>
   <!--end::Title-->
   <div class="d-flex align-items-center gap-2 gap-lg-3">
    <!--begin::Filter menu-->
    <div class="d-flex">
        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
        <a href="#" class="btn btn-icon btn-sm btn-success flex-shrink-0 ms-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Filter menu-->
    <!--begin::Secondary button-->
    <!--end::Secondary button-->
    <!--begin::Primary button-->
    <!--end::Primary button-->
</div>
@endsection
@section('content')
@livewire('back.struktur-organisasi')
@endsection
@push('scripts')
<script>
    $(window).on('hidden.bs.modal',function(){
        Livewire.emit('resetForms');
    });

    window.addEventListener('hide_Stu_modal', function(event){
        $('#Stu_modal').modal('hide');
    })

    window.addEventListener('showEditStuModal',function(event){
        $('#edit_stu_modal').modal('show')
    })
    window.addEventListener('hide_edit_stu_modal', function(event){
        $('#edit_stu_modal').modal('hide');
    })
    window.addEventListener('deleteStu', function(event){
        swal.fire({
            title:event.detail.title,
            imageWidth:48,
            imageHeight:48,
            html:event.detail.html,
            showCloseButton:true,
            showCancelButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes, delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#3085d6',
            width:300,
            allowOutsideClick:false,
        }).then(function(result){
            if (result.value) {
                Livewire.emit('deleteStuAction', event.detail.id)
            }
        })
    })
</script>
@endpush
