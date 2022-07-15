<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function index(){
        
        $users = Users::all();
        return view ('userspage')->with('users', $users);
    }

    public function edit($id){
        
        $users = Users::find($id);
        return view('edituser')->with('users', $users);
    }
    public function update($id, Request $request){
        
        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->save();
        return redirect('/admin/userspage');
    }

    public function destroy($id){
        
        $users = Users::find($id);
        $users->delete();
        return redirect('/admin/userspage');
    }
}
