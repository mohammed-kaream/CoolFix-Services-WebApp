<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // 🛠️ إذا كان لديه جلسة ضيف زائر، اسمح له بالمرور فوراً وتخطى فحص الحساب والإيميل
    if (session()->has('guest_auth')) {
        return $next($request);
    }

        if ($request->pass == 123) {
            return $next($request);
        } else {
            return redirect('/')->with('error', 'عذراً يا صغير، الصفحة للبالغين فقط! 🔞');
        }

        // 2. إذا نجح في الفحص، خليه يمرق بسلام للرابط اللي بعده 🌟
    }
    //     if ($request->age < 18) {
    //         return redirect('/')->with('error', 'عذراً يا صغير، الصفحة للبالغين فقط! 🔞');
    //     }

    //     // 2. إذا نجح في الفحص، خليه يمرق بسلام للرابط اللي بعده 🌟
    //     return $next($request);
    // }
}
