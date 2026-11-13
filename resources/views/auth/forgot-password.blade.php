<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('deslogin/css/auth-pro.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('deslogin/image/favicon.png') }}">
    <title>Forgot Password - COOLFIX</title>

    <style>
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
            font-weight: 500;
        }
    </style>
</head>

<body class="body-forgot">
    <div class="container swapped swap-enter">

        <div class="form-panel">
            <div class="hheroo">
                <img class="img w-40" src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="">

                <div class="login">
                    <h2 class="sin">Forgot Password</h2>
                    <p class="papr">Enter the email you registered with to receive a password reset link</p>
                </div>

                <div class="form">
                    <!-- إظهار رسالة النجاح الخضراء إذا تم إرسال الرابط للإيميل بنجاح -->
                    @if (session('status'))
                        <div class="session-success-status">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ربط النموذج بمسار استقبال طلبات الاستعادة التابع للارافيل -->
                    <form class="f" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="lab-inp">
                            <label for="email">Email</label>
                            <!-- حقل الإدخال مع خاصية الحفظ التلقائي للنص القديم name="email" -->
                            <input class="input-email" type="email" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}" required autofocus>

                            <!-- إظهار رسائل الخطأ من لارافيل في حال كان الإيميل غير موجود بالسيستم -->
                            @error('email')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-cr">
                            <button type="submit" class="btn-forget">Send Reset Link</button>
                            <div class="account">
                                <p>Remembered your password?</p>
                                <!-- تعديل الرابط ليعود لصفحة تسجيل الدخول الرسمية بنجاح -->
                                <a href="{{ route('login') }}" class="swap-nav">Sign In</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="brand-panel">
            <div class="brand-logo"><img src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="COOLFIX"></div>
            <div class="brand-illustration"><img src="{{ asset('deslogin/image/auth-illustration.svg') }}" alt="COOLFIX refrigeration illustration"></div>
            <div class="brand-copy">
                <h1>It happens. Let's get you back in.</h1>
                <p>Enter the email on your account and we'll send you a link to reset your password securely.</p>
                <div class="brand-trust">
                    <span><i class="fa-solid fa-shield-halved"></i> Certified Technicians</span>
                    <span><i class="fa-solid fa-bolt"></i> Same-Day Response</span>
                    <span><i class="fa-solid fa-check-circle"></i> Genuine Parts Only</span>
                </div>
            </div>
        </div>

    </div>
    <!-- تعديل مسارات ملفات الـ JS البرمجية التابعة لك لتشتغل بسلاسة -->
    <script src="{{ asset('deslogin/js/forgot.js') }}"></script>
    <script src="{{ asset('deslogin/js/panel-swap.js') }}"></script>
</body>

</html>
