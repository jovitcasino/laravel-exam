@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Edit Expense Category</h3></div>

                <div class="card-body">
                <form action="{{ route('updateExpCat', $expcat->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="expCatDisplayName">Display Name</label>
                    <input type="text" name="expCatDisplayName" value="{{$expcat->expCatDisplayName}}" class="form-control" id="expCatDisplayName" aria-describedby="emailHelp" placeholder="Display Name">
                </div>
                
                <div class="form-group">
                    <label for="expCatDescription">Description</label>
                    <input type="text" name="expCatDescription" value="{{$expcat->expCatDescription}}" class="form-control" id="expCatDescription" placeholder="Description">
                </div>
                <td><a href="{{ route('expCatList') }}" class="btn btn-xs btn-danger pull-right">Cancel</a></td>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection