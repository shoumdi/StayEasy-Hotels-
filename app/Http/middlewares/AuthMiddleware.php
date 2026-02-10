<?php
namespace App\Http\middlewares;

use App\Http\interfaces\Middleware;
use Illuminate\Http\Request;
use Closure;

class AuthMiddleware implements Middleware {
    public function handle(Request $req, Closure $handler)
    {
        $user = auth()->user();
        if(!$user) return redirect('/login'); 
        if($user->status=== 'banned') return redirect('/logout');
        return $handler($req);      
    }
}