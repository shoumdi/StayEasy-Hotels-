<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        // dd($roles);
        return view('admin.roles.index',compact('roles'));
    }

    public function edit(Request $req){
        $id = $req->validate([
            'id'=>['required']
        ]);
        $role = Role::find((int)$id);
        return view('admin.roles.form',compact('role'));
    }
}
