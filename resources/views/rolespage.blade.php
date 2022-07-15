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
                <div class="card-header"><h3>Roles</h3></div>

                <div class="card-body">
                 <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn">
                    Add Role
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                            
                            
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('submitRole') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="roleDisplayName">Display Name</label>
                                <input type="text" class="form-control" name="roleDisplayName" id="roleDisplayName" aria-describedby="emailHelp" placeholder="Display Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="roleDescription">Description</label>
                                <input type="text" class="form-control" name="roleDescription" id="roleDescription" aria-describedby="emailHelp" placeholder="Description">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddRoleModal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                        </div>
                    </div>
                    </div>
                <br><br>
                <table id="role" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Display Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($role as $role)
            <tr>    
                <td>{{$role->roleDisplayName}}</td>
                <td>{{$role->roleDescription}}</td>
                <td>{{$role->created_at}}</td>
                <td>
                @if($role->roleDisplayName != 'Admin')
                <a href="{{ route('editRole', $role->id) }}" class="btn btn-xs btn-success pull-right">Edit</a>
                <a href="{{ route('deleteRole', $role->id)}} " class="btn btn-xs btn-danger pull-right">delete</a>
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
$("#closeAddRoleModal").click(function(){
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
