<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
