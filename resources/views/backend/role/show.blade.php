@extends('layouts.partials.master')
@section('title', 'Show Roles')

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></li>
<li class="breadcrumb-item active"> Show Role</li>
@endsection

@section('content')
<div class="col-md-8">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Show Roles {{$role->id}}</h3>
            <a href="{{ route('roles.index') }}" class="btn btn-warning float-right"><i
                    class="fas fa-arrow-circle-left"></i> Batal</a>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

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

            <p>Role name: {{ $role->name }}</p>
            <p>
                Permisssions:
                @foreach ($role->permissions as $permission)
                <span class="badge badge-primary">{{ $permission->name }}</span>
                @endforeach
            </p>

            <div class="row justify-content-between">
                    <a href="{{ route('roles.add', $role->id) }}" class="btn btn-sm  btn-info">Add
                        user</a>
                    <a href="{{ route('roles.edit', $role->id) }}"
                        class="btn btn-sm  btn-light border">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
