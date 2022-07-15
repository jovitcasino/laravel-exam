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
                <div class="card-header"><h3>Expense Categories</h3></div>

                <div class="card-body">
                 <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="catBtn">
                    Add Category
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Expense Category</h5>
                            
                            
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('submitExpCat') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="expCatDisplayName">Display Name</label>
                                <input type="text" name="expCatDisplayName" class="form-control" id="expCatDisplayName" aria-describedby="emailHelp" placeholder="Display Name">
                            </div>
                            
                            <div class="form-group">
                                <label for="expCatDescription">Description</label>
                                <input type="text" name="expCatDescription" class="form-control" id="expCatDescription" aria-describedby="emailHelp" placeholder="Description">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddExpCatModal">Close</button>
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
            @foreach($expcat as $expcat)
            <tr>
                
                <td>{{$expcat->expCatDisplayName}}</td>
                <td>{{$expcat->expCatDescription}}</td>
                <td>{{$expcat->created_at}}</td>
                <td><a href="{{ route('editExpCat', $expcat->id) }}" class="btn btn-xs btn-success pull-right">Edit</a></td>
                    
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
$("#catBtn").click(function(){
  $("#myModal").modal('show');
});
});

$(document).ready(function(){
$("#closeAddExpCatModal").click(function(){
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
