<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
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
        $role = Role::find((int)$id['id']);

        return view('admin.roles.form',compact('role'));
    }

    public function update(Request $req){
        $role = $req->validate([
            'id'=>['required'],
            'name'=>['required']
        ]);
        try {
            Role::find($role['id'])->update($role);
            return redirect()->route('admin.roles.index');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Request $req){
        $data = $req->validate(['id'=>['required']]);
        Role::find($data['id'])->delete();
        return redirect()->route('admin.roles.index');
    }
}
