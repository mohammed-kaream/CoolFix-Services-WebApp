<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckIfBlocked
{
    /**
     * دالة فحص وطرد الحساب المحظور مع استثناء طلب تسجيل الخروج للزوار
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 🛠️ إذا كان الطلب الحالي هو تسجيل خروج (logout) ولديه جلسة زائر، نمسحها ونحوله فوراً للوجن بدون فحص الوهمي
        if ($request->is('logout') && session()->has('guest_auth')) {
            session()->forget('guest_auth');
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('login');
        }

        // 🛠️ الشغل الصح: حقن المستخدم الوهمي فقط لباقي صفحات الموقع لتخطي حراس Breeze
        if (session()->has('guest_auth') && !Auth::check()) {
            $guestUser = new User();
            $guestUser->id = 0;
            $guestUser->type = 'guest';
            $guestUser->name = 'Guest Visitor';

            Auth::setUser($guestUser);
        }

        // 🎯 الفحص الحاسم للحسابات المحظورة الحقيقية
        if (Auth::check() && Auth::user()->is_blocked) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'لقد تم حظر حسابك بقرار من الإدارة! انتظر الأدمن لما يفكه. 🚫');
        }

        return $next($request);
    }
}
