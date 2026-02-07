<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $user = auth()->user()->load('role','image');
        // dd($roles);
        $links = [
            [
                'title' => 'Users',
                'selected' => false,
                'route' => route('admin.users.index'),
                "icon" => 'fa-solid fa-user-large me-3'

            ],
            [
                'title' => 'Roles',
                'selected' => true,
                'route' => route('admin.roles.index'),
                "icon" => 'fa-solid fa-key me-3'

            ],
            [
                'title' => 'Hotels',
                'selected' => false,
                'route' => '',
                "icon" => 'fa-solid fa-bed me-3'
            ]
        ];
        return view('admin.roles.index', compact('roles', 'links','user'));
    }
    function create()
    {
        return view('admin.roles.form');
    }
    public function edit(Request $req)
    {
        $id = $req->validate([
            'id' => ['required']
        ]);
        $role = Role::find((int)$id['id']);

        return view('admin.roles.form', compact('role'));
    }
    public function store(Request $req)
    {
        // dd($req);
        $role = $req->validate([
            'id' => ['nullable'],
            'name' => ['required'],
            // 'description' => ['nullable'],
        ]);
        try {
            Role::create($role);
            return redirect()->route('admin.roles.index');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function update(Request $req)
    {
        $role = $req->validate([
            'id' => ['required'],
            'name' => ['required']
        ]);
        try {
            Role::find($role['id'])->update($role);
            return redirect()->route('admin.roles.index');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete(Request $req)
    {
        $data = $req->validate(['id' => ['required']]);
        Role::find($data['id'])->delete();
        return redirect()->route('admin.roles.index');
    }
}
