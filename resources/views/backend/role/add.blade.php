@extends('layouts.partials.master')

@section('title', 'Roles')
@push('head')
<!-- DataTables -->

@endpush
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></li>
<li class="breadcrumb-item active"> Create Role</li>
@endsection

@section('content')
<div class="row justify-content-between">
    <div class="col-md-5">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add Role To Users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

                <div class="card-body">
                     <!-- Errors -->
                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="role" id="role" value="{{$role->name}}">
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{ route('roles.add', $role->id) }}" method="post">
                        @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Users</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " id="name" name="name">

                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-warning">Save</button>
                        <a href="{{route('roles.index')}}" type="submit" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
                </div>
                <!-- /.card-body -->


                <!-- /.card-footer -->
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cari Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="data" class="table table-bordered table-striped data table-responsive" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@includeIf('includes.datatable')
@push('js')

<script>
    $(document).ready(function () {
        const table = $('#data').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            "ajax": {
                url: "{{url('')}}/user/data/role",
                type: "POST",
                data: function (d) {

                }
            },
            columnDefs: [{
                    "targets": 0,
                    "sortable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-nowrap",
                    "render": function (data, type, row, meta) {
                        return row.name
                    }
                },

            ]
        });
    });

</script>
@endpush
