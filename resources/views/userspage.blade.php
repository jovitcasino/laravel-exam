@extends('layouts.app')

@section('content')
<script>
$(document).ready(function () {
    $('#role').DataTable();
});


</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Users</h3></div>

                <div class="card-body">
                <p>Users can be added by registering in the system as it requires a password.</p>
                <p><b>ROLES:</b> Admin = 1; Basic User = 0</p>
                
                 <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn">
                    Add User
                    </button> -->

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                            
                            
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="displayName">Display Name</label>
                                <input type="text" class="form-control" id="displayName" aria-describedby="emailHelp" placeholder="Display Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Description">
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddUserModal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                
                <table id="role" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->role}}</td>
                <td>{{$users->created_at}}</td>
                
                <td>
                @if($users->role != '1')    
                <a href="{{ route('editUser', $users->id) }}" class="btn btn-xs btn-success pull-right">Edit</a>
                <a href="{{ route('deleteUser', $users->id)}} " class="btn btn-xs btn-danger pull-right">delete</a>
                @endif
                </td> 
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                
                
            </tr>
        </tfoot>
    </table>


<script>
$(document).ready(function(){
$("#myBtn").click(function(){
  $("#myModal").modal('show');
});
});

$(document).ready(function(){
$("#closeAddUserModal").click(function(){
  $("#myModal").modal('hide');
});
});


</script>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
