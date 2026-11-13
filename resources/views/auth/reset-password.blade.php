<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="stylesheet" href="{{ asset('deslogin/css/auth-pro.css') }}">
    <link rel="stylesheet" href="https://cloudflare.com">
    <link rel="icon" href="{{ asset('deslogin/image/favicon.png') }}">
    <title>Reset Password - COOLFIX</title>

    <style>
        .laravel-error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container swapped swap-enter">

        <div class="form-panel">
            <div class="hheroo">
                <img class="img w-40" src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="">

                <div class="login">
                    <h2 class="sin">Reset Password</h2>
                    <p class="papr">Enter your email and set your new password to log in</p>
                </div>

                <div class="form">
                    <form class="f" method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- مفتاح الأمان المخفي القادم من رابط البريد الإلكتروني (إجباري) -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="lab-inp">
                            <!-- الحقل الأول: البريد الإلكتروني (تم تعديل النوع إلى email ليعمل النظام) -->
                            <label for="email">Email Address</label>
                            <input class="input-email" type="email" name="email" id="email"
                                placeholder="Enter your email" value="{{ old('email', $request->email) }}" required
                                autofocus autocomplete="username">
                            @error('email')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <!-- الحقل الثاني: كلمة المرور الجديدة -->
                            <label for="password">New Password</label>
                            <div class="field-relative">
                                <input class="input-passwordd" type="password" name="password" id="password"
                                    placeholder="Enter new password" required autocomplete="new-password">
                                <div class="icon-eye-slashh">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>
                                <div class="icon-eye-openn">
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror

                            <!-- الحقل الثالث: تأكيد كلمة المرور الجديدة -->
                            <label for="password_confirmation">Confirm New Password</label>
                            <input class="input-password" type="password" name="password_confirmation"
                                id="password_confirmation" placeholder="Confirm new password" required
                                autocomplete="new-password">

                            @error('password_confirmation')
                                <span class="laravel-error-message"><i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="btn-cr">
                            <button type="submit" class="btn">Confirm</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="brand-panel">
            <div class="brand-logo"><img src="{{ asset('deslogin/image/image_4c8a122c.png') }}" alt="COOLFIX"></div>
            <div class="brand-illustration"><img src="{{ asset('deslogin/image/auth-illustration.svg') }}"
                    alt="COOLFIX refrigeration illustration"></div>
            <div class="brand-copy">
                <h1>Choose a strong new password.</h1>
                <p>Set a new password to secure your account and get back to managing your repairs.</p>
                <div class="brand-trust">
                    <span><i class="fa-solid fa-shield-halved"></i> Certified Technicians</span>
                    <span><i class="fa-solid fa-bolt"></i> Same-Day Response</span>
                    <span><i class="fa-solid fa-check-circle"></i> Genuine Parts Only</span>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('deslogin/js/resetpassword.js') }}"></script>
</body>

</html>
