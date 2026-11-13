<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('deslogin/css/auth-pro.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="{{ asset('deslogin/image/favicon.png') }}">
    <title>{{ __('Create Account') }} - COOLFIX</title>

    <style>
        .laravel-error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            margin-bottom: 10px;
            display: block;
            font-weight: 500;
        }

        /* ===== أزرار الإنارة واللغة ===== */
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
        }
        html[dir="ltr"] .auth-tools { right: 16px; left: auto; }
        html[dir="rtl"] .auth-tools { left: 16px; right: auto; }

        .theme-toggle-switch {
            width: 52px;
            height: 28px;
            border-radius: 999px;
            border: 0;
            cursor: pointer;
            background: #013e37;
            display: flex;
            align-items: center;
            padding: 0 3px;
        }
        .theme-toggle-knob {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #FEC961;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: transform .3s;
        }
        body.dark-mode .theme-toggle-knob { transform: translateX(24px); }

        .auth-lang {
            padding: 5px 16px;
            border-radius: 20px;
            border: 1px solid #E2E8F0;
            background: #fff;
            color: #1A444E;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            white-space: nowrap;
        }
        .auth-lang:hover { background: #013e37; color: #fff; }

        /* ===== الدارك مود ===== */
        body.dark-mode { background: #050b0a; }
        body.dark-mode .auth-tools { background: rgba(10, 23, 22, .9); box-shadow: 0 0 20px rgba(45, 255, 196, .25); }
        body.dark-mode .theme-toggle-switch { background: #0b2420; box-shadow: 0 0 12px rgba(45, 255, 196, .5); }
        body.dark-mode .theme-toggle-knob { background: #ffd166; }
        body.dark-mode .auth-lang { background: transparent; color: #2dffc4; border-color: rgba(45, 255, 196, .5); }
        body.dark-mode .form-panel,
        body.dark-mode .hheroo { background: #0a1716 !important; }
        body.dark-mode .hheroo h2,
        body.dark-mode .hheroo label { color: #2dffc4 !important; }
        body.dark-mode .hheroo p,
        body.dark-mode .hheroo .divider { color: #a6cbc3 !important; }
        body.dark-mode .hheroo a,
        body.dark-mode .account a { color: #2dffc4 !important; }
        body.dark-mode .link a span { color: #eafffa !important; }
        body.dark-mode .hheroo input[type="text"],
        body.dark-mode .hheroo input[type="email"],
        body.dark-mode .hheroo input[type="password"] {
            background: #0a1715 !important;
            color: #eafffa !important;
            border: 1px solid rgba(45, 255, 196, .3) !important;
        }

        /* ===== موبايل وتابلت ===== */
        @media (max-width: 900px) {
            html[dir="ltr"] .auth-tools,
            html[dir="rtl"] .auth-tools {
                left: 50%;
                right: auto;
                transform: translateX(-50%);
                top: 10px;
            }

            .container {
                display: flex !important;
                flex-direction: column !important;
                width: 100% !important;
                max-width: 100% !important;
                min-height: 100vh;
                margin: 0 !important;
                border-radius: 0 !important;
                padding-top: 64px !important;
            }

            .brand-panel {
                width: 100% !important;
                padding: 18px 20px 60px !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                text-align: center !important;
                gap: 10px;
            }
            .brand-logo,
            .brand-illustration {
                display: flex !important;
                justify-content: center !important;
                width: 100% !important;
                margin: 0 !important;
            }
            .brand-logo img { height: 32px !important; width: auto !important; }
            .brand-illustration img { max-width: 130px !important; width: 50% !important; height: auto !important; }
            .brand-copy { display: none !important; }
            .hheroo > img.img { display: none !important; }

            .form-panel {
                width: 100% !important;
                padding: 0 16px 28px !important;
                margin-top: -44px !important;
                position: relative;
                z-index: 2;
                display: flex !important;
                justify-content: center !important;
            }
            .hheroo {
                width: 100% !important;
                max-width: 460px !important;
                margin: 0 auto !important;
                padding: 24px 20px !important;
                background: #fff;
                border-radius: 26px;
                box-shadow: 0 18px 40px rgba(1, 62, 55, .18);
            }
            .login { text-align: center !important; margin-bottom: 12px; }
            .sin { font-size: 1.45rem !important; }
            .papr { font-size: .88rem !important; }

            .hheroo input[type="text"],
            .hheroo input[type="email"],
            .hheroo input[type="password"] {
                width: 100% !important;
                height: 48px !important;
                font-size: 16px !important;
            }
            .btn { width: 100% !important; height: 48px !important; border-radius: 14px !important; }

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
            .brand-illustration img { max-width: 110px !important; }
            .hheroo { padding: 20px 16px !important; }
            .link a span { font-size: .82rem !important; }
        }
    </style>
</head>

<body>
    <div class="auth-tools">
        <button type="button" class="theme-toggle-switch" id="authTheme" aria-label="Toggle dark mode">
            <span class="theme-toggle-knob" id="authKnob">☀️</span>
        </button>
        <a class="auth-lang" href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">
            {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
        </a>
    </div>

    <div class="container">

        <div class="brand-panel">
            <div class="brand-logo"><img src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="COOLFIX"></div>
            <div class="brand-illustration"><img src="{{ asset('deslogin/image/auth-illustration.svg') }}"
                    alt="COOLFIX refrigeration illustration"></div>
            <div class="brand-copy">
                <h1>{{ __('Join thousands who trust COOLFIX with their cooling.') }}</h1>
                <p>{{ __('Create an account to book repairs faster, track technician visits, and keep a full history of every service on your fridge or freezer.') }}</p>
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
                    <h2 class="sin">{{ __('Create your account') }}</h2>
                    <p class="papr">{{ __('Enter your information to create a new account') }}</p>
                </div>

                <div class="form">
                    <form class="f" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="lab-inp">

                            <label for="name">{{ __('Name') }}</label>
                            <input class="input-name" type="text" name="name" id="name"
                                placeholder="{{ __('Enter your name') }}" value="{{ old('name') }}" required autofocus
                                autocomplete="name">
                            @error('name')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <label for="mobile">{{ __('Phone') }}</label>
                            <input class="input-phone" type="text" name="mobile" id="mobile"
                                placeholder="{{ __('Enter your phone') }}" value="{{ old('mobile') }}" required>
                            @error('mobile')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <label for="email">{{ __('Email') }}</label>
                            <input class="input-email" type="email" name="email" id="email"
                                placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" required
                                autocomplete="username">
                            @error('email')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <label for="password">{{ __('Password') }}</label>
                            <div class="field-relative">
                                <input class="input-passwordd" type="password" name="password" id="password"
                                    placeholder="{{ __('Enter password') }}" required autocomplete="new-password">
                                <div class="icon-eye-slashh"><i class="fa-solid fa-eye-slash"></i></div>
                                <div class="icon-eye-openn"><i class="fa-solid fa-eye"></i></div>
                            </div>
                            @error('password')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input class="input-password" type="password" name="password_confirmation"
                                id="password_confirmation" placeholder="{{ __('Enter password') }}" required
                                autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                        </div>

                        <div class="btn-cr">
                            <button type="submit" class="btn">{{ __('Create Account') }}</button>
                            <div class="account">
                                <p>{{ __('Already have an account?') }}</p>
                                <a href="{{ route('login') }}">{{ __('Sign In') }}</a>
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

    <script src="{{ asset('deslogin/js/signin.js') }}"></script>
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
