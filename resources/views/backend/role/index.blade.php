@extends('layouts.partials.master')

@section('title', 'Roles')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Role</li>
@endsection

@section('content')
<div class="row justify-content-between">
    <div class="col-md-5">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">List Role</h3>
                {{-- <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary float-right"> <i
                        class="fas fa-plus-circle"></i>
                    Add
                    Roles To Users</a> --}}
            </div>
            <!-- /.card-header -->
            @if ($roles->isNotEmpty())
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles->sortByDesc('created_at') as $e=>$role)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$role->id}}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}">
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">

                </ul>
            </div>
        </div>
        <!-- /.card -->
        <!-- /.card -->
    </div>
    <div class="col-md-5">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Role Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                    </div>
                    <div class="form-group">
                        @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                    id="permission-{{ $permission->id }}" name="permission[]"
                                    value="{{ $permission->id }}">
                                <label class="custom-control-label"
                                    for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection
