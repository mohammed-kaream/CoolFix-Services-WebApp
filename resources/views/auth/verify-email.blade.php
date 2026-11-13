<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Verify Email') }} | COOLFIX</title>
    <link rel="icon" type="image/png" href="{{ asset('webfront/images/all-img/image_48ee44cebd.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--teal:#013e37;--teal2:#0a6b5c;--cream:#FEF3C7;--line:#0a8f7e;--neon:#2dffc4}
        *{box-sizing:border-box}
        html,body{margin:0;min-height:100%}
        body{font-family:'Lexend','Cairo',sans-serif;background:#fff;color:#33514c;transition:background .3s}
        html[lang="ar"] body{font-family:'Cairo','Lexend',sans-serif}

        /* ===== أزرار الإنارة واللغة ===== */
        .auth-tools{position:fixed;top:14px;z-index:9999;direction:ltr;display:flex;align-items:center;gap:10px;
            padding:6px 10px;border-radius:40px;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);
            box-shadow:0 6px 20px rgba(1,62,55,.2);white-space:nowrap}
        html[dir="ltr"] .auth-tools{right:16px;left:auto}
        html[dir="rtl"] .auth-tools{left:16px;right:auto}
        .theme-toggle-switch{width:52px;height:28px;border-radius:999px;border:0;cursor:pointer;background:#013e37;
            display:flex;align-items:center;padding:0 3px}
        .theme-toggle-knob{width:22px;height:22px;border-radius:50%;background:#FEC961;display:flex;
            align-items:center;justify-content:center;font-size:12px;transition:transform .3s}
        body.dark-mode .theme-toggle-knob{transform:translateX(24px)}
        .auth-lang{padding:5px 16px;border-radius:20px;border:1px solid #E2E8F0;background:#fff;color:#1A444E;
            font-weight:600;font-size:13px;text-decoration:none;white-space:nowrap}
        .auth-lang:hover{background:#013e37;color:#fff}

        /* ===== التخطيط ===== */
        .wrap{display:grid;grid-template-columns:1fr 1fr;min-height:100vh}
        .side{position:relative;overflow:hidden;color:#fff;padding:36px 56px;display:flex;flex-direction:column;
            justify-content:space-between;background:radial-gradient(900px 600px at 30% 40%,#0b6b57 0%,#06453b 55%,#032e28 100%)}
        .side .logo{height:40px;width:auto;align-self:flex-start}
        .illus{flex:1;display:grid;place-items:center}
        .illus img{width:min(380px,80%);height:auto}
        .side h2{margin:0 0 8px;font-size:2rem;font-weight:700;color:#fff}
        .side p{margin:0;color:#bfe3da;line-height:1.8}

        .main{display:flex;align-items:center;justify-content:center;padding:24px}
        .card{width:100%;max-width:520px;padding:44px 40px;border:2px solid var(--line);border-radius:40px;
            box-shadow:0 20px 50px rgba(1,62,55,.12);background:#fff;text-align:start}
        .card h1{margin:0 0 8px;font-size:2rem;color:var(--teal);font-weight:700}
        .card .sub{margin:0 0 22px;color:#5d756f;line-height:1.8;font-size:.98rem}
        .icon{width:70px;height:70px;border-radius:50%;display:grid;place-items:center;font-size:1.9rem;
            margin-bottom:18px;background:var(--teal);color:var(--cream)}
        .ok{margin-bottom:18px;padding:12px 14px;border-radius:12px;background:#e7f8ef;border:1px solid #9fdcbb;
            color:#12663a;font-weight:600;font-size:.9rem}
        .btn{width:100%;padding:16px;border:0;border-radius:14px;background:var(--teal);color:#fff;
            font:700 1rem inherit;font-family:inherit;cursor:pointer;transition:.25s}
        .btn:hover{background:var(--teal2)}
        .out{display:block;margin:18px auto 0;background:none;border:0;color:var(--teal);
            font:600 .95rem inherit;font-family:inherit;cursor:pointer}
        .out:hover{text-decoration:underline}

        /* ===== الدارك مود ===== */
        body.dark-mode{background:#050b0a;color:#a6cbc3}
        body.dark-mode .auth-tools{background:rgba(10,23,22,.9);box-shadow:0 0 20px rgba(45,255,196,.25)}
        body.dark-mode .theme-toggle-switch{background:#0b2420;box-shadow:0 0 12px rgba(45,255,196,.5)}
        body.dark-mode .theme-toggle-knob{background:#ffd166}
        body.dark-mode .auth-lang{background:transparent;color:var(--neon);border-color:rgba(45,255,196,.5)}
        body.dark-mode .main{background:#050b0a}
        body.dark-mode .card{background:#0a1716;border-color:rgba(45,255,196,.4);box-shadow:0 0 40px rgba(45,255,196,.12)}
        body.dark-mode .card h1{color:var(--neon);text-shadow:0 0 14px rgba(45,255,196,.45)}
        body.dark-mode .card .sub{color:#a6cbc3}
        body.dark-mode .icon{background:#0b3b34;color:var(--neon);box-shadow:0 0 24px rgba(45,255,196,.4)}
        body.dark-mode .btn{background:linear-gradient(135deg,#2dffc4,#7fffe0);color:#02121a;box-shadow:0 0 22px rgba(45,255,196,.45)}
        body.dark-mode .out{color:var(--neon)}
        body.dark-mode .ok{background:rgba(45,255,196,.1);border-color:rgba(45,255,196,.4);color:#c9fff1}

        /* ===== موبايل وتابلت ===== */
        @media(max-width:900px){
            .wrap{grid-template-columns:1fr}
            .side{display:none}
            html[dir="ltr"] .auth-tools,html[dir="rtl"] .auth-tools{left:50%;right:auto;transform:translateX(-50%);top:10px}
            .main{padding:76px 16px 28px;min-height:100vh;
                background:linear-gradient(160deg,#0b6b57,#032e28)}
            body.dark-mode .main{background:linear-gradient(160deg,#06201b,#030807)}
            .card{padding:30px 22px;border-radius:28px}
            .card h1{font-size:1.6rem}
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

    <div class="wrap">
        <aside class="side">
            <img class="logo" src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="COOLFIX">

            <div class="illus">
                <img src="{{ asset('deslogin/image/auth-illustration.svg') }}" alt="COOLFIX">
            </div>

            <div>
                <h2>{{ __('One last step') }}</h2>
                <p>{{ __('Confirm your email to start using COOLFIX.') }}</p>
            </div>
        </aside>

        <main class="main">
            <div class="card">
                <div class="icon">✉</div>
                <h1>{{ __('Verify your email') }}</h1>
                <p class="sub">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="ok">{{ __('A new verification link has been sent to the email address you provided during registration.') }}</div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn">{{ __('Resend Verification Email') }}</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="out">{{ __('Log Out') }}</button>
                </form>
            </div>
        </main>
    </div>

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
