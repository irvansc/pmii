@extends('back.layouts.pages-layouts')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'setting struktur organisasi')
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
