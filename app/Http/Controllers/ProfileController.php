<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        // dd($user);
        return view('shared.profile', compact('user'));
    }

    public function edit(Request $req)
    {
        $user = auth()->user()->load('role');
        return view('shared.edit-profile', compact('user'));
    }
    public function update(Request $req)
    {
        $user = auth()->user();
        $data = $req->validate([
            'name' => ['required'],
            'email' => ['required'],
            // 'password'=>['required']
        ]);
        $pictureUrl = Storage::url($req->file('picture')->store('images/profile', 'public'));
        $user->update($data);
        dd($pictureUrl);
        $user->image()->create(
            [
                'url' => $pictureUrl
            ]
        );
    }
}
