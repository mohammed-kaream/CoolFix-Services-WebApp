<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->type !== 'admin') {
            abort(403, 'غير مصرّح لك بدخول هذه الصفحة.');
        }

        return $next($request);
    }
}
