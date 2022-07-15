@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Edit User</h3></div>

                <div class="card-body">
                <form action="{{ route('updateUser', $users->id) }}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Display Name</label>
                    <input type="text" name="name"value="{{$users->name}}" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Display Name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{$users->email}}" class="form-control" id="email" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="role">Role (1 if Admin; 0 if Basic User)</label>
                    
                    <input type="text" name="role" value="{{$users->role}}" class="form-control" id="role" placeholder="Description">
                </div>
                
                <td><a href="{{ route('userList') }}" class="btn btn-xs btn-danger pull-right">Cancel</a></td>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection