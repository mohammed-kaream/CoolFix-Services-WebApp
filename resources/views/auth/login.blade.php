<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('deslogin/css/auth-pro.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('deslogin/image/favicon.png') }}">
<title>{{ __('Sign In') }} - COOLFIX</title>
    <style>
.form-panel { padding-top: 70px; }
.auth-tools {
    position: fixed;
    top: 14px;
    z-index: 9999;
    direction: ltr;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 10px;
    border-radius: 40px;
    background: rgba(255, 255, 255, .92);
    backdrop-filter: blur(8px);
    box-shadow: 0 6px 20px rgba(1, 62, 55, .2);
    white-space: nowrap;
    transform: none;
}

/* إنجليزي: أقصى اليمين فوق */
html[dir="ltr"] .auth-tools { right: 16px; left: auto; }

/* عربي: أقصى اليسار فوق */
html[dir="rtl"] .auth-tools { left: 16px; right: auto; }
.theme-toggle-switch{
    width: 52px; height: 28px; border-radius: 999px; border: 0; cursor: pointer;
    background: #013e37; display: flex; align-items: center; padding: 0 3px;
}
.theme-toggle-knob{
    width: 22px; height: 22px; border-radius: 50%; background: #FEC961;
    display: flex; align-items: center; justify-content: center; font-size: 12px;
    transition: transform .3s;
}
body.dark-mode .theme-toggle-knob{ transform: translateX(24px); }
.auth-lang{
    padding: 5px 16px; border-radius: 20px; border: 1px solid #E2E8F0;
    background: #fff; color: #1A444E; font-weight: 600; font-size: 13px;
    text-decoration: none; white-space: nowrap;
}
.auth-lang:hover{ background: #013e37; color: #fff; }

/* الدارك مود لصفحة الدخول */
body.dark-mode{ background: #050b0a; }
body.dark-mode .auth-tools{ background: rgba(10,23,22,.9); box-shadow: 0 0 20px rgba(45,255,196,.25); }
body.dark-mode .theme-toggle-switch{ background: #0b2420; box-shadow: 0 0 12px rgba(45,255,196,.5); }
body.dark-mode .theme-toggle-knob{ background: #ffd166; }
body.dark-mode .auth-lang{ background: transparent; color: #2dffc4; border-color: rgba(45,255,196,.5); }
body.dark-mode .form-panel, body.dark-mode .hheroo{ background: #0a1716 !important; }
body.dark-mode .hheroo h2, body.dark-mode .hheroo label{ color: #2dffc4 !important; }
body.dark-mode .hheroo p, body.dark-mode .hheroo .divider{ color: #a6cbc3 !important; }
body.dark-mode .hheroo input[type="text"],
body.dark-mode .hheroo input[type="password"]{
    background: #0a1715 !important; color: #eafffa !important;
    border: 1px solid rgba(45,255,196,.3) !important;
}
        .laravel-error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
            font-weight: 500;
        }
        .session-success-status {
            color: #22c55e;
            background-color: #f0fdf4;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            text-align: center;
        }

    </style>
</head>
<!-- START ULTRA PREMIUM TOAST FOR LOGIN PAGE -->
@if (session('error'))
<div id="custom-toast-notification" class="cyber-toast-wrapper" style="position: fixed; top: 30px; right: -450px; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(10px); border-radius: 16px; padding: 18px 25px; box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15), 0 4px 12px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 18px; z-index: 999999; transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); min-width: 360px; overflow: hidden; border: 1px solid rgba(254, 226, 226, 0.8);">

    <!-- 1. دائرة إشارة التحذير (⚠️) النيونية النابضة والدوارة 🚀 -->
    <div class="cyber-icon-spin" style="width: 38px; height: 38px; background: linear-gradient(135deg, #ef4444, #b91c1c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; font-weight: 800; font-size: 1.2rem; box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4); flex-shrink: 0; position: relative;">
        ⚠️
        <!-- حلقة التوهج النبضي الخارجي -->
        <span class="pulse-ring"></span>
    </div>

    <!-- 2. نصوص رسالة الحظر المطلوبة بالملي -->
    <div style="display: flex; flex-direction: column; text-align: right; direction: rtl; flex-grow: 1;">
        <span class="cyber-title-glow" style="font-weight: 800; font-size: 1rem; margin-bottom: 3px; letter-spacing: 0.5px;">تنبيه أمني صارم 🔒</span>
        <span id="toast-message-text" style="color: #334155; font-size: 0.9rem; font-weight: 600; line-height: 1.4;">{{ session('error') }}</span>
    </div>

    <!-- 3. شريط وقت الحياة التنازلي التفاعلي الممتد بالأسفل 👇🎯 -->
    <div class="toast-progress-bar"></div>
</div>

<!-- 🎨 كود الحركات التفاعلية والـ Keyframes العبقرية لإشعار الـ Login بقوة الـ !important -->
<style>
    /* ===== موبايل وتابلت ===== */
@media (max-width: 900px) {
    html, body { min-height: 100%; }

    .container {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        max-width: 100% !important;
        min-height: 100vh;
        margin: 0 !important;
        border-radius: 0 !important;
    }

    /* اللوحة العلوية: اللوجو + الرسمة بالنص، بحجم صغير */
    .brand-panel {
        width: 100% !important;
        padding: 22px 20px 70px !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        text-align: center !important;
        gap: 12px;
    }
    .brand-logo,
    .brand-illustration {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        width: 100% !important;
        margin: 0 !important;
    }
    .brand-logo img { height: 34px !important; width: auto !important; }
    .brand-illustration img { max-width: 150px !important; width: 55% !important; height: auto !important; }

    /* النص التسويقي مخفي على الجوال */
    .brand-copy { display: none !important; }

    /* اللوجو المكرر داخل الفورم */
    .hheroo > img.img { display: none !important; }

    /* الكرت الأبيض يطلع فوق اللوحة الخضراء */
    .form-panel {
        width: 100% !important;
        padding: 0 16px 28px !important;
        margin-top: -50px !important;
        position: relative;
        z-index: 2;
        display: flex !important;
        justify-content: center !important;
    }
    .hheroo {
        width: 100% !important;
        max-width: 460px !important;
        margin: 0 auto !important;
        padding: 26px 20px !important;
        background: #fff;
        border-radius: 26px;
        box-shadow: 0 18px 40px rgba(1, 62, 55, .18);
    }
    .login { text-align: center !important; margin-bottom: 14px; }
    .sin { font-size: 1.5rem !important; }
    .papr { font-size: .9rem !important; }

    .lab-inp input, .input-email, .input-password {
        width: 100% !important;
        height: 50px !important;
        font-size: 16px !important; /* يمنع زوم الآيفون */
    }
    .btn { width: 100% !important; height: 50px !important; border-radius: 14px !important; }

    /* زرّين فيسبوك وجوجل جنب بعض بنفس العرض */
    .link {
        display: flex !important;
        flex-direction: row !important;
        gap: 10px !important;
        width: 100% !important;
    }
    .link a {
        flex: 1 1 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        height: 46px !important;
        padding: 0 8px !important;
        font-size: .9rem !important;
        border-radius: 12px !important;
    }
    .link a img { width: 20px !important; height: 20px !important; }
}

@media (max-width: 400px) {
    .brand-illustration img { max-width: 120px !important; }
    .hheroo { padding: 22px 16px !important; }
    .link a span { font-size: .82rem !important; }
}
/* تدرج التوهج النيوني الأحمر على الحواف الجانبية */
.cyber-toast-wrapper::before {
    content: ''; position: absolute; top: 0; right: 0; width: 6px; height: 100%;
    background: linear-gradient(to bottom, #ef4444, #dc2626);
}

/* 🎯 وضعية الدخول الحركية المرنة لداخل الشاشة */
.cyber-toast-wrapper.show-toast-ultra {
    right: 30px !important;
    animation: shakeGlow 0.4s ease-in-out forwards;
}

/* 🔄 حركة دوران وحيوية الأيقونة عند الظهور */
.cyber-toast-wrapper.show-toast-ultra .cyber-icon-spin {
    animation: spinIcon 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.2s forwards;
}

/* ⏳ شريط التناقص والتقلص التفاعلي بالأسفل */
.toast-progress-bar {
    position: absolute; bottom: 0; left: 0; height: 4px; width: 100%;
    background: linear-gradient(to right, #ef4444, #f97316);
    transform-origin: left;
}
.cyber-toast-wrapper.show-toast-ultra .toast-progress-bar {
    animation: shrinkProgress 4s linear forwards; /* يتقلص على مدار 4 ثوانٍ بالظبط ليتناسب مع وقت قراءة الرسالة الطويلة */
}

/* 💥 كود الـ Keyframes للحركات والاهتزاز الضوئي النابض 👇 */
@keyframes spinIcon {
    0% { transform: scale(0) rotate(0deg); }
    100% { transform: scale(1) rotate(360deg); }
}

@keyframes shrinkProgress {
    0% { transform: scaleX(1); }
    100% { transform: scaleX(0); }
}

@keyframes shakeGlow {
    0% { transform: translateX(20px) scale(0.95); }
    50% { transform: translateX(-5px) scale(1.02); box-shadow: 0 25px 50px rgba(239, 68, 68, 0.3) !important; }
    100% { transform: translateX(0) scale(1); }
}

/* حلقة النبض الضوئي المشعة حول دائرة التحذير الحمراء */
.pulse-ring {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    border: 2px solid #ef4444; border-radius: 50%;
    animation: pulseGlow 1.8s infinite ease-in-out;
}
@keyframes pulseGlow {
    0% { transform: scale(1); opacity: 1; }
    100% { transform: scale(1.6); opacity: 0; }
}

/* تأثير نبض وتوهج النص العلوي */
.cyber-title-glow {
    background: linear-gradient(135deg, #dc2626, #f97316);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>

<!-- 🎯 4. سكربت الـ Vanilla JS المطور للتحريك التلقائي والسحب بمرونة -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var loginToast = document.getElementById('custom-toast-notification');

    if (loginToast) {
        // 1. دفع ودخول الإشعار بمرونة وتوهج من اليمين في أعلى الصفحة بعد 300 ملي ثانية
        setTimeout(function() {
            loginToast.classList.add('show-toast-ultra');
        }, 300);

        // 2. سحب وإخفاء الإشعار بنعومة فائقة فور انتهاء تقلص الشريط السفلي (بعد 4.3 ثانية)
        setTimeout(function() {
            loginToast.style.transform = "translateX(450px) scale(0.9)";
            loginToast.style.opacity = "0";
        }, 4300);

        // 3. مسح الكلاسات وتنظيف الـ DOM تماماً لتأمين عمليات الدخول التالية
        setTimeout(function() {
            loginToast.classList.remove('show-toast-ultra');
            loginToast.style.transform = "";
            loginToast.style.opacity = "";
        }, 4800);
    }
});
</script>
@endif
<!-- END ULTRA PREMIUM TOAST FOR LOGIN PAGE -->

<body>
    <div class="auth-tools">
        <button type="button" class="theme-toggle-switch" id="authTheme" aria-label="Toggle dark mode">
            <span class="theme-toggle-knob" id="authKnob">☀️</span>
        </button>
        <a class="auth-lang" href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">
            {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
        </a>
    </div>

    <div class="container swap-enter">

        <div class="brand-panel">
            <div class="brand-logo"><img src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="COOLFIX"></div>
            <div class="brand-illustration"><img src="{{ asset('deslogin/image/auth-illustration.svg') }}" alt="COOLFIX refrigeration illustration"></div>
            <div class="brand-copy">
                <h1>{{ __('Manage every repair job from one account.') }}</h1>
                <p>{{ __('Manage your COOLFIX orders and repairs in one place.') }}</p>
                <div class="brand-trust">
                    <span><i class="fa-solid fa-shield-halved"></i> {{ __('Certified Technicians') }}</span>
                    <span><i class="fa-solid fa-bolt"></i> {{ __('Same-Day Response') }}</span>
                    <span><i class="fa-solid fa-check-circle"></i> {{ __('Genuine Parts Only') }}</span>
                </div>
            </div>
        </div>

        <div class="form-panel">
            <div class="hheroo">
                <img class="img w-40" src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="">

                <div class="login">
                    <h2 class="sin">{{ __('Welcome back') }}</h2>
                    <p class="papr">{{ __('Enter your email or phone and password to sign in') }}</p>
                </div>

                <div class="form">
                    @if (session('status'))
                        <div class="session-success-status">{{ session('status') }}</div>
                    @endif

                    <form class="f" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="lab-inp">
                            <label for="email">{{ __('Email') }}</label>
                            <input class="input-email" type="text" name="email" id="email"
                                placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" required autofocus
                                autocomplete="username">

                            @error('email')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                            @enderror

                            <div class="forget">
                                <label for="password">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="swap-nav">{{ __('Forgot Password?') }}</a>
                                @endif
                            </div>

                            <div class="field-relative">
                                <input class="input-password" type="password" name="password" id="password"
                                    placeholder="{{ __('Enter password') }}" required autocomplete="current-password">
                                <div class="icon-eye-slash"><i class="fa-solid fa-eye-slash"></i></div>
                                <div class="icon-eye-open"><i class="fa-solid fa-eye"></i></div>
                            </div>

                            @error('password')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                            @enderror

                            <div class="checkboox">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me">{{ __('Remember password') }}</label>
                            </div>
                        </div>

<div class="btn-cr">
    <!-- 1. زر تسجيل الدخول الأساسي -->
    <button type="submit" class="btn" style="width: 100%;">{{ __('Sign In') }}</button>

    <!-- 2. زر الدخول كضيف زائر (بنفس التنسيق والألوان المريحة والمطابقة تماماً) -->
    <a href="{{ route('login.guest') }}" class="btn"
       style="width: 100%;
              background-color: #033931;
              color: #ffffff;
              font-weight: bold;
              border-radius: 12px;
              padding: 12px 0;
              text-align: center;
              display: block;
              text-decoration: none;
              margin-top: 15px;
              border: none;
              transition: background-color 0.3s ease;">
        {{ __('الدخول كضيف زائر') }}
    </a>

    <!-- 3. قسم إنشاء حساب جديد -->
    <div class="account" style="margin-top: 20px;">
        <p>{{ __("Don't have an account?") }}</p>
        <a href="{{ route('register') }}">{{ __('Create Account') }}</a>
    </div>
</div>

                        <div class="divider">{{ __('or continue with') }}</div>
                        <div class="link">
                            <a class="face" href="">
                                <img src="{{ asset('deslogin/image/Group 3455.png') }}" alt="">
                                <span>Facebook</span>
                            </a>
                            <a class="goog" href="">
                                <img src="{{ asset('deslogin/image/search 1.png') }}" alt="">
                                <span>Google</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('deslogin/js/script.js') }}"></script>
    <script src="{{ asset('deslogin/js/panel-swap.js') }}"></script>
    <script>
        (function() {
            var knob = document.getElementById('authKnob');
            function apply(t) {
                var d = t === 'dark';
                document.body.classList.toggle('dark-mode', d);
                knob.textContent = d ? '🌙' : '☀️';
                try { localStorage.setItem('coolfix_theme', t); } catch (e) {}
            }
            var saved = 'light';
            try { saved = localStorage.getItem('coolfix_theme') || 'light'; } catch (e) {}
            apply(saved);
            document.getElementById('authTheme').addEventListener('click', function() {
                apply(document.body.classList.contains('dark-mode') ? 'light' : 'dark');
            });
        })();
    </script>
</body>
</html>
