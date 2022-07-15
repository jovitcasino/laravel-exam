@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Edit Role</h3></div>

                <div class="card-body">
                <form action="{{ route('updateRole', $role->id) }}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="roleDisplayName">Display Name</label>
                    <input type="text" name="roleDisplayName"value="{{$role->roleDisplayName}}" class="form-control" id="roleDisplayName" aria-describedby="emailHelp" placeholder="Display Name">
                </div>
                
                <div class="form-group">
                    <label for="roleDescription">Description</label>
                    <input type="text" name="roleDescription" value="{{$role->roleDescription}}" class="form-control" id="roleDescription" placeholder="Description">
                </div>
                <td><a href="{{ route('list') }}" class="btn btn-xs btn-danger pull-right">Cancel</a></td>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection