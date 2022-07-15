<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index(){

        $role = Role::all();
        
        return view ('rolespage')->with('role', $role);
        // return view ('rolespage');
    }

    public function store(Request $request){
        
        $role = new Role();

        $role->roleDisplayName = $request->roleDisplayName;
        $role->roleDescription = $request->roleDescription;

        $role->save();
        return redirect('/admin/rolespage');
    }

    public function edit($id){
        
        $role = Role::find($id);
        return view('editrole')->with('role', $role);
    }

    public function update($id, Request $request){
        
        $role = Role::find($id);
        $role->roleDisplayName = $request->roleDisplayName;
        $role->roleDescription = $request->roleDescription;
        $role->save();
        return redirect('/admin/rolespage');
    }

    public function destroy($id){
        
        $role = Role::find($id);
        $role->delete();
        return redirect('/admin/rolespage');
    }
}
