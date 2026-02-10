<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $links = [
            [
                'title' => 'Users',
                'selected' => true,
                'route' => route('admin.users.index'),
                "icon" => 'fa-solid fa-user-large me-3'

            ],
            [
                'title' => 'Roles',
                'selected' => false,
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
        $authenticatedUser = auth()->user()->load(['role', 'image']);
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users', 'links', 'authenticatedUser'));
    }

    public function edit(Request $req)
    {
        $data = $req->validate([
            'id' => ['required'],
        ]);
        $user = User::with('role')->find((int)$data['id']);
        $roles = Role::whereNot('name', 'Admin')->get();
        // dd($roles);
        return view('admin.users.edit', compact(['user', 'roles']));
    }
    public function update(Request $req)
    {
        $data = $req->validate([
            'id' => ['required'],
        ]);
        // dd($data);
        User::find((int)$data['id'])->update(['status' => 'active']);
        return redirect()->route('admin.users.index');
    }
    public function updateStatus(Request $req)
    {
        $data = $req->validate([
            'id' => ['required'],
            'status' => ['required']
        ]);
        // dd($data);
        User::find((int)$data['id'])->update(['status' => $data['status']]);
        return redirect()->route('admin.users.index');
    }
    public function delete(Request $req)
    {
        $data = $req->validate([
            'id' => ['required'],
        ]);
        // dd($data);
        User::find((int)$data['id'])->delete();
        return redirect()->route('admin.users.index');
    }
}
