<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureTeacher
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('teacher')->check()) {
            return $next($request);
        }

        return redirect()->route('admin.login')->with('error', 'You do not have access to this page.');
    }
}
