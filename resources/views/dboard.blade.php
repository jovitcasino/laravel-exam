@extends('layouts.app')

@section('content')
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Dashboard</h3></div>

                <div class="card-body">
                @if(Auth::user()->role == '1')
                    <p>Listed below are the TOTAL EXPENSES of all users.</p>
                    @endif
                    @if(Auth::user()->role == '0')
                    <p>My Total Expenses</p>
                    @endif
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Category</th>
                <th>Total</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($expcat as $expcat)
            <tr>
                <td>{{$expcat->expCatDisplayName}}</td>
                <td>{{$expenses->where('expcat',$expcat->expCatDisplayName)->sum('expAmount')}}</td>
                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                
                
            </tr>
        </tfoot>
    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
