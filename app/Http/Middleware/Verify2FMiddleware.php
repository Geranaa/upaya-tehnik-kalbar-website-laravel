<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Verify2FMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Session::has('two_factor_login_authenticated')) {
            if (!$request->is('two-factor-login', 'two-factor-login/verify')) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['status' => false, 'message' => 'Two-factor authentication required.'], 401);
                } else {
                    return redirect()->route('two-factor-login.index');
                }
            }
        }
        return $next($request);
    }
}
