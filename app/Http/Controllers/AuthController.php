<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function me()
    {
        
        $user = auth()->user();
        switch ($user->role->name ?? 'Guest') {
            case 'Admin':
                return redirect()->route('admin.roles.index');
                break;
            case 'Client':
                die('client');
                break;
            case 'Manager':
                die('Manager');
                break;
            default:
                return view('front-office.home');
        }
    }
    public function showLoginView()
    {
        return view('login');
    }
    public function showRegisterView()
    {
        $roles = Role::whereNot('name', 'Admin')->get();
        return view('register', compact('roles'));
    }
    public function create() {}
    public function login(Request $req)
    {

        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('auth.me');
        }
        return redirect()->route('auth.login');
    }
    public function register(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name' => ['required'],
            'role_id' => ['required'],
            ]);
            // dd($req);
        if (User::where('email', $credentials['email'])->exists()) {
            return redirect()->route('auth.register');
        }
        $credentials['status']= (Role::where('name','Manager')->value('id') === (int)$credentials['role_id'])? 'pending' : 'active';
        // dd($credentials);
        try {
            $user = User::create($credentials);
            $user->image()->create();
            if ($user === null || !Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ])) {
                return redirect()->route('auth.register');
            }
            $req->session()->regenerate();
            return redirect()->route('auth.me');
        } catch (QueryException $e) {
            dd($e);
            return redirect()->route('auth.register');
        } catch (Exception $e) {
        }
    }

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
