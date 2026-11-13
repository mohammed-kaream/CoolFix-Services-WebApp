<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
    return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
public function destroy(\Illuminate\Http\Request $request): \Illuminate\Http\RedirectResponse
{
    // 1. مسح وتدمير جلسة الضيف الزائر نهائياً فور الضغط على خروج
    if (session()->has('guest_auth')) {
        session()->forget('guest_auth');
    }

    // 2. تسجيل الخروج الرسمي للحسابات الحقيقية من حارس لارافيل
    \Illuminate\Support\Facades\Auth::guard('web')->logout();

    // 3. تطهير المتصفح وإبطال توكن الحماية القديم لعدم حدوث تعليق
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // 4. التوجيه الفوري والنظيف لصفحة تسجيل الدخول العادية
    return redirect()->route('login');
}
}
