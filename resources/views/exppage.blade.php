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
                <div class="card-header"><h3>Expenses</h3></div>

                <div class="card-body">
                 <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="catBtn">
                    Add Expense
                    </button>
                    <br><br>
                    @if(Auth::user()->role == '1')
                    <p>Listed below are the expenses of all users.</p>
                    @endif
                    @if(Auth::user()->role == '0')
                    <p>Listed below is/are your Individual Expenses.</p>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Expense</h5>
                            
                            
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('submitExp') }}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="expCatDisplayName">Expense Category</label>
                                <select class="form-control" name="expCatDisplayName"> 
                                    @foreach($expcat as $expcat)
                                    <option value="{{$expcat->expCatDisplayName}}">{{$expcat->expCatDisplayName}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="expAmount">Amount</label>
                                <input type="text" name="expAmount" class="form-control" id="expAmount" aria-describedby="emailHelp" placeholder="Amount">
                            </div>
                            <!-- <div class="form-group">
                                <label for="expDateCreated">Entry Date</label>
                                <input type="date" class="form-control" id="expDateCreated" aria-describedby="emailHelp" placeholder="Description">
                            </div> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddExpCatModal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                        </div>
                    </div>
                    </div>
                
                <table id="role" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Display Name</th>
                <th>Amount</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach($expenses as $expenses)
            <tr>
                
                <td>{{$expenses->expcat}}</td>
                <td>{{$expenses->expAmount}}</td>
                <td>{{$expenses->created_at}}</td>
                <td>{{$expenses->updated_at}}</td>
                <td><a href="{{ route('editExp', $expenses->id) }}" class="btn btn-xs btn-success pull-right">Edit</a></td>
                    
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
