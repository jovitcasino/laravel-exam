<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\ExpCat;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $expcat = ExpCat::all();
        $expenses = Expenses::all();

        if(Auth::user()->role == '1'){
            return view('dboard', ['expcat'=>$expcat, 'expenses'=>$expenses]);
        }
        else{
            $expenses=$expenses->where('authUser_id', Auth::user()->id);
            return view ('dboard', ['expenses'=>$expenses, 'expcat'=>$expcat]);
        }
        
    }
}
