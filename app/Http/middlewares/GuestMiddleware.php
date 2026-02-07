<?php
namespace App\Http\middlewares;

use App\Http\interfaces\Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class GuestMiddleware implements Middleware{
    public function handle(Request $req, Closure $handler)
    {
        if (auth()->user()) return Redirect('/');
        return $handler($req);
    }
}