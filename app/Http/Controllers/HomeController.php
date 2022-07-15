<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\ExpCat;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expcat = ExpCat::all();
        $expenses = Expenses::all();

        if(Auth::user()->role == '1'){
            return view('home', ['expcat'=>$expcat, 'expenses'=>$expenses]);
        }
        else{
            $expenses=$expenses->where('authUser_id', Auth::user()->id);
            return view ('home', ['expenses'=>$expenses, 'expcat'=>$expcat]);
        }
        // return view('home');
    }
    public function dboard()
    {
        return view('dboard');
    }
    public function rolespage()
    {
        return view('rolespage');
    }
    public function userspage()
    {
        return view('userspage');
    }
    public function expcatpage()
    {
        return view('expcatpage');
    }
    public function exppage()
    {
        return view('exppage');
    }
    public function editrole()
    {
        return view('editrole');
    }
    
    public function editexpcat()
    {
        return view('editexpcat');
    }
    public function editexp()
    {
        return view('editexp');
    }
}
