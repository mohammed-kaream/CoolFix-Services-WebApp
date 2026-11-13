<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');

        // التوجيه الذكي: إذا كان الطلب هو تسجيل خروج للضيف، يتم تمريره فوراً للوجن، وإلا يفحص الجلسة بشكل طبيعي
        $middleware->redirectGuestsTo(function() {
            if (request()->is('logout') && session()->has('guest_auth')) {
                session()->forget('guest_auth');
                return route('login');
            }
            return session()->has('guest_auth') ? null : route('login');
        });

        $middleware->redirectUsersTo('/index');

        // الشغل الصح: حارس الحظر أولاً ليمسك طلب الـ logout والزوار الحقيقيين، ثم اللغات
        $middleware->web(append: [
            \App\Http\Middleware\CheckIfBlocked::class,
            \App\Http\Middleware\SetLocale::class,
        ]);

        $middleware->alias([
            'is.adult' => \App\Http\Middleware\CheckAge::class,
            'admin'    => CheckAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
