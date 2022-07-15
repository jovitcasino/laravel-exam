<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExpCat;

class ExpCatController extends Controller
{
    public function index(){

        $expcat = ExpCat::all();
        
        return view ('expcatpage')->with('expcat', $expcat);
        // return view ('rolespage');
    }
    public function store(Request $request){

        $expcat = new ExpCat();
        $expcat->expCatDisplayName = $request->expCatDisplayName;
        $expcat->expCatDescription = $request->expCatDescription;

        $expcat->save();
        return redirect('/expcatpage');
    }
    public function edit($id){
        
        $expcat = ExpCat::find($id);
        return view('editexpcat')->with('expcat', $expcat);
    }
    public function update($id, Request $request){
        
        $expcat = ExpCat::find($id);
        $expcat->expCatDisplayName = $request->expCatDisplayName;
        $expcat->expCatDescription = $request->expCatDescription;
        $expcat->save();
        return redirect('/admin/expcatpage');
    }
}
