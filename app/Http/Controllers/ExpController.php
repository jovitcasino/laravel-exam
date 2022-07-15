<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\ExpCat;
use Illuminate\Support\Facades\Auth;

class ExpController extends Controller
{
    public function index(){
        $expcat = ExpCat::all();
        $expenses = Expenses::all();
        
        if(Auth::user()->role == '1'){
            return view ('exppage', ['expenses'=>$expenses, 'expcat'=>$expcat]);
        }
        else{
            $expenses=$expenses->where('authUser_id', Auth::user()->id);
            return view ('exppage', ['expenses'=>$expenses, 'expcat'=>$expcat]);
        }
        
    }

    public function store(Request $request){
        $expenses = new Expenses();
        $expenses->authUser_id = auth()->id();
        $expenses->expcat = $request->expCatDisplayName;
        $expenses->expAmount = $request->expAmount;
        $expenses->save();
        return redirect('/exppage');
    }

    public function edit($id){
        
        $expenses = Expenses::find($id);
        return view('editexp')->with('expenses', $expenses);
    }
    public function update($id, Request $request){
        
        $expenses = Expenses::find($id);
        $expenses->expcat = $request->expCatDisplayName;
        $expenses->expAmount = $request->expAmount;
        $expenses->save();
        return redirect('/exppage');
    }
}
