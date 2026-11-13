<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description"
        content="COOLFIX provides fast, reliable refrigerator, freezer and cooling repair and maintenance in Gaza. Call 059 892 4040.">
    <meta name="keywords"
        content="refrigerator repair, fridge repair, refrigeration maintenance, cooling technician, Gaza appliance repair, freezer repair, AC repair, COOLFIX">
    <meta name="author" content="COOLFIX">
    <!-- SITE TITLE -->
    <title>@yield('title', 'COOLFIX Gaza')</title>
    <script src="{{ asset('webfront/js/jquery-1.12.4.min.js') }}"></script>

    <link rel="icon" type="image/png" href="{{ asset('webfront/images/all-img/image_48ee44cebd.png') }}">

    @if (app()->getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('webfront/bootstrap/css/bootstrap.rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    @else
        <link rel="stylesheet" href="{{ asset('webfront/bootstrap/css/bootstrap.min.css') }}">
    @endif
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('webfront/webfonts/themify-icons.css') }}">
    <!-- All Min Css -->
    <link rel="stylesheet" href="{{ asset('webfront/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('webfront/css/fontawesome.min.css') }}">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="{{ asset('webfront/owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('webfront/owlcarousel/css/owl.theme.css') }}">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="{{ asset('webfront/css/magnific-popup.css') }}">
    <!--jquery-simple-mobilemenu Css-->
    <link rel="stylesheet" href="{{ asset('webfront/css/jquery-simple-mobilemenu.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('webfront/css/animate.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('webfront/css/style.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- 🚨 بار التفتيش السري: لا يظهر إلا إذا كان الرئيس يتقمص حساباً حالياً -->
    @if (session()->has('impersonator_id'))
        <div class="super-admin-impersonate-bar"
            style="background: linear-gradient(90deg, #dc2626, #b91c1c); color: #ffffff; padding: 12px; text-align: center; font-weight: 800; font-size: 0.98rem; position: relative; z-index: 999999; display: flex; justify-content: center; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3); direction: rtl;">
            <span>🕵️‍♂️ تنبيه سيادي: أنت تتصفح الموقع الحين وثائقياً بهوية الموظف: <b
                    style="color: #fef08a;">{{ auth()->user()->name }}</b></span>

            <a href="{{ route('admin.user.leave_impersonate') }}"
                style="background: #ffffff; color: #b91c1c; padding: 6px 16px; border-radius: 20px; font-weight: 900; text-decoration: none; font-size: 0.88rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.2s ease; display: inline-block;">
                🔴 العودة لكرسي الرئيس
            </a>
        </div>
    @endif

</head>

<body>
    <!-- شاشة ثلاجة كول فيكس السريعة والخارقة -->
    <div id="fridge-loader" class="fridge-overlay">
        <div class="fridge-container">
            <!-- الباب الأيسر للثلاجة -->
            <div class="fridge-door door-left">
                <div class="fridge-handle handle-left"></div>
            </div>
            <!-- الباب الأيمن للثلاجة -->
            <div class="fridge-door door-right">
                <div class="fridge-handle handle-right"></div>
            </div>
            <!-- محتويات الثلاجة الداخلية (الاسم والتحميل) -->
            <div class="fridge-interior">
                <div class="fridge-light"></div>
                <div class="fridge-logo">
                    <span class="cool-text">COOLFIX</span>
                    <div class="loading-dots">
                        @if (app()->getLocale() == 'ar')
                            <!-- الحروف العربية مدمجة في مقاطع متصلة لكي لا تظهر متقطعة، مع الحفاظ على الأنيميشن الموجي -->
                            <span class="ar-word">جاري</span>
                            <span class="ar-word">التحميل</span>
                            <span class="ar-dot">.</span><span class="ar-dot">.</span><span class="ar-dot">.</span>
                        @else
                            <!-- الإنجليزي يظل مفككاً لأن الحروف اللاتينية لا تتأثر بالاتصال -->
                            <span>l</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span><span>.</span><span>.</span><span>.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- يمنع وميض الوضع الفاتح قبل تحميل الصفحة إذا كان الوضع الليلي محفوظاً -->
    <script>
        try {
            if (localStorage.getItem('coolfix_theme') === 'dark') document.body.classList.add('dark-mode');
        } catch (e) {}
    </script>

    @php
        $cfxNav = [
            [__('Home'), '/', '/'],
            [__('About Us'), '/about', 'about'],
            [__('Services'), '/services', 'services'],
            [__('Pricing'), '/pricing', 'pricing'],
            [__('FAQ'), '/faq', 'faq'],
            [__('Contact'), '/contact', 'contact'],
            [__('Data'), '/data', 'data'],
            [__('Information'), '/posts/inform', 'posts/inform*'],
        ];
    @endphp
    <!-- ===================== STICKY COMPACT HEADER (يظهر من فوق عند النزول) ===================== -->
    <header id="cfxStickyBar" class="cfx-sticky" aria-hidden="true">
<div class="container">
    <div class="cfx-sticky-in">
        <!-- شعار الموقع الرسمي الموجه للرئيسية -->
        <a class="cfx-sticky-logo" href="{{ url('/') }}">
            <img src="{{ asset('webfront/images/brand/logo.svg') }}" alt="COOLFIX logo">
        </a>

        <!-- 1. شريط التنقل الرئيسي للشاشات الكبيرة (فرز صارم وثابت للثلاث حالات) -->
        <nav class="cfx-sticky-nav" aria-label="Main">
            <!-- الروابط العامة للزوار (تظهر للجميع دائماً: ضيف، مستخدم، أدمن) -->
            <a href="{{ url('/') }}" class="{{ request()->is('/') || request()->is('index') ? 'active' : '' }}">{{ __('Home') }}</a>
            <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">{{ __('About Us') }}</a>
            <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">{{ __('Services') }}</a>

            <!-- روابط المستخدم المسجل (تظهر فقط لليوزر الحقيقي والأدمن، وتختفي تماماً عن الضيف الزائر) -->
            @if (!session()->has('guest_auth') && auth()->check() && auth()->user()->type !== 'guest')
                <a href="{{ url('/pricing') }}" class="{{ request()->is('pricing') ? 'active' : '' }}">{{ __('Pricing') }}</a>
                <a href="{{ url('/faq') }}" class="{{ request()->is('faq') ? 'active' : '' }}">{{ __('FAQ') }}</a>
                <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">{{ __('Contact') }}</a>
            @endif

            <!-- روابط الإدارة الحصرية (تظهر حصرياً للأدمن الفعلي فقط ويتم حمايتها بالـ Policy) -->
            @auth
                @if (auth()->user()->type === 'admin')
                    @can('viewAny', App\Models\User::class)
                        <a href="{{ url('/data') }}" class="{{ request()->is('data') ? 'active' : '' }}">{{ __('Data') }}</a>
                        <a href="{{ url('/posts/inform') }}" class="{{ request()->is('posts/inform') ? 'active' : '' }}">{{ __('Information') }}</a>
                    @endcan
                @endif
            @endauth
        </nav>

        <!-- أدوات الهيدر الجانبية (الوضع الليلي، تغيير اللغة، وزر الخروج) -->
        <div class="cfx-sticky-tools">
            <div class="theme-toggle-switch" role="button" tabindex="0" aria-label="Toggle dark mode">
                <div class="theme-toggle-knob">☀️</div>
            </div>

            <a class="coolfix-lang-btn" id="langSwitcherBtn"
                href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">
                {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
            </a>

            <a class="cfx-sticky-logout" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Log Out') }} <i class="fa-solid fa-arrow-right"></i>
            </a>

            <button class="cfx-burger cfx-sticky-burger" type="button" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</div>

<!-- 2. قائمة الجوال المنسدلة الجانبية (تم ضبطها وتثبيتها بنفس التقسيم المضمون 100%) -->
<div class="cfx-sticky-menu" id="cfxStickyMenu">
    <!-- الروابط العامة للزوار -->
    <a href="{{ url('/') }}" class="{{ request()->is('/') || request()->is('index') ? 'active' : '' }}">{{ __('Home') }}</a>
    <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">{{ __('About Us') }}</a>
    <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">{{ __('Services') }}</a>

    <!-- روابط المستخدم المسجل -->
    @if (!session()->has('guest_auth') && auth()->check() && auth()->user()->type !== 'guest')
        <a href="{{ url('/pricing') }}" class="{{ request()->is('pricing') ? 'active' : '' }}">{{ __('Pricing') }}</a>
        <a href="{{ url('/faq') }}" class="{{ request()->is('faq') ? 'active' : '' }}">{{ __('FAQ') }}</a>
        <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">{{ __('Contact') }}</a>
    @endif


    <!-- روابط الإدارة الحصرية -->
    @auth
        @if (auth()->user()->type === 'admin')
            @can('viewAny', App\Models\User::class)
                <a href="{{ url('/data') }}" class="{{ request()->is('data') ? 'active' : '' }}">{{ __('Data') }}</a>
                <a href="{{ url('/posts/inform') }}" class="{{ request()->is('posts/inform') ? 'active' : '' }}">{{ __('Information') }}</a>
            @endcan
        @endif
    @endauth
</div>
    </header>

    <!-- START PRELOADER -->
    {{-- <div class="preloaders">
        <span class="loader" data-text="{{ __('Loading data...') }}">{{ __('Loading data...') }}</span>
    </div> --}}
    <!-- END PRELOADER -->

    <!-- START TOP HEADER CLASS -->
    <div class="top_header_banner">
        <!-- START LOGO WITH CONTACT -->

        <section class="logo-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="single-top-contact">
                            <i class="ti-mobile"></i>
                            <h4><a href="tel:+970598924040">059 892 4040</a></h4>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="single-top-contact">
                            <i class="ti-email"></i>
                            <h4><a href="mailto:mohammedkareem@gmail.com">mohammedkareem@gmail.com</a></h4>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="single-top-contact">
                            <i class="ti-alarm-clock"></i>
                            <h4>{{ __('Sat to Thu: 8am - 8pm') }}</h4>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="top_social_profile">
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100010037628573&locale=ar_AR"
                                        class="top_f_facebook"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/@Mohamed.123."
                                        class="fa-brands fa-youtube"><i></i></a>
                                </li>
                                <li><a href="https://wa.me/972598924040" class="top_f_twitter"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/abo______kareem/" class="top_f_instagram"><i
                                            class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li><a href="#" class="top_f_linkedin"><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </section>
        <!-- END LOGO WITH CONTACT -->

        <!-- START NAVBAR -->
        <div id="navigation" class="navbar-light bg-faded site-navigation">
            <div class="container">
                <div class="row align-items-center">

                    <!-- 1. الشعار (اللوجو) -->
                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="site-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('webfront/images/brand/logo.svg') }}" alt="COOLFIX logo">
                            </a>
                        </div>
                    </div><!--- END Col -->

                    <!-- 2. القائمة الرئيسية -->
                    <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                        <nav id="main-menu">
                            <ul class="d-flex justify-content-center list-unstyled m-0 gap-1 flex-nowrap">
                                <!-- 1. الروابط العامة (تظهر دائماً وللجميع: ضيف، مستخدم، أدمن) -->
                                <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ url('/about') }}">{{ __('About Us') }}</a></li>
                                <li><a href="{{ url('/services') }}">{{ __('Services') }}</a></li>

                                <!-- 2. روابط المستخدم المسجل (تظهر لليوزر والأدمن، وتختفي عن الضيف) -->
                                @if (!session()->has('guest_auth'))
                                    <li><a href="{{ url('/pricing') }}">{{ __('Pricing') }}</a></li>
                                    <li><a href="{{ url('/faq') }}">{{ __('FAQ') }}</a></li>
                                    <li><a href="{{ url('/contact') }}">{{ __('Contact') }}</a></li>
                                @endif

                                <!-- 3. روابط الإدارة الحصرية (تظهر للأدمن فقط ويتم فحصها عبر الـ Policy) -->
                                @auth
                                    @can('viewAny', App\Models\User::class)
                                        <li><a href="{{ url('/data') }}">{{ __('Data') }}</a></li>
                                        <li><a href="{{ url('/posts/inform') }}">{{ __('Information') }}</a></li>
                                    @endcan
                                @endauth
                            </ul>
                        </nav>
                    </div><!--- END Col -->

                    <!-- 3. قسم الأزرار -->
                    <div class="col-xl-4 col-lg-5 col-6 text-end">
                        <div class="d-flex align-items-center justify-content-end gap-2 navbar-buttons-wrapper">

                            <!-- زر تبديل النمط (ليلي / نهاري) -->
                            <div class="coolfix-theme-switch m-0">
                                <div class="theme-toggle-switch" id="themeToggleSwitch" role="button"
                                    tabindex="0" aria-label="Toggle dark mode">
                                    <div class="theme-toggle-knob" id="themeToggleKnob">☀️</div>
                                </div>
                            </div>

                            <!-- زر اللغة -->
                            <a class="coolfix-lang-btn cfx-sticky-lang"
                                href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">
                                {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
                            </a>
                            <!-- زر تسجيل الخروج -->
                            <div class="call_to_action">
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a class="btn_two btn btn-primary" href="{{ route('logout') }}"
                                        style="white-space: nowrap; border-radius: 50px;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }} <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </form>
                            </div>
                            <button class="cfx-burger d-lg-none" id="cfxBurger" aria-label="Menu"
                                aria-expanded="false" type="button">
                                <span></span><span></span><span></span>
                            </button>
                        </div>
                    </div><!--- END Col -->

                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </div>
        <div id="cfxMobileMenu" class="cfx-mobile-menu">
            <!-- 1. الروابط العامة (تظهر دائماً وللجميع: ضيف، مستخدم، أدمن) -->
            <a href="{{ url('/') }}">{{ __('Home') }}</a>
            <a href="{{ url('/about') }}">AboutUs</a>
            <a href="{{ url('/services') }}">{{ __('Services') }}</a>

            <!-- 2. روابط المستخدم المسجل (تظهر لليوزر والأدمن، وتختفي عن الضيف كلياً) -->
            @if (!session()->has('guest_auth'))
                <a href="{{ url('/pricing') }}">{{ __('Pricing') }}</a>
                <a href="{{ url('/faq') }}">{{ __('FAQ') }}</a>
                <a href="{{ url('/contact') }}">{{ __('Contact') }}</a>
            @endif

            <!-- 3. روابط الإدارة الحصرية (تظهر للأدمن فقط ويتم فحصها عبر الـ Policy) -->
            @auth
                @can('viewAny', App\Models\User::class)
                    <a href="{{ url('/data') }}">{{ __('Data') }}</a>
                    <a href="{{ url('/posts/inform') }}">{{ __('information') }}</a>
                @endcan
            @endauth
        </div>
        <!-- END NAVBAR -->


        <style>
            .home-stagger-item {
                opacity: 0;
                transform: translateY(10px);
                transition: opacity 350ms ease, transform 350ms ease;
                transition-delay: var(--stagger-delay, 0ms);
            }

            .home-stagger-item.is-visible {
                opacity: 1;
                transform: translateY(0);
            }

            @media (prefers-reduced-motion: reduce) {
                .home-stagger-item {
                    opacity: 1;
                    transform: none;
                    transition: none;
                }
            }

            #navigation.is-stuck {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 99999;
                background: #fff;
                box-shadow: 0 6px 24px rgba(1, 62, 55, .18);
                animation: cfxSlideDown .45s cubic-bezier(.22, 1, .36, 1) both;
            }

            /* =====================================================================
               TOGGLE + NAV BUTTONS
               ===================================================================== */
            :root {
                --toggle-amber: #FEC961;
                --toggle-teal: #013e37;
                --toggle-teal-dark: #012722;
                --neon: #2dffc4;
                --neon-soft: #7fffe0;
                --neon-amber: #ffd166;
            }

            .theme-toggle-switch {
                width: 52px;
                height: 28px;
                flex-shrink: 0;
                border-radius: 999px;
                border: 1px solid rgba(1, 62, 55, 0.15);
                background: var(--toggle-teal);
                position: relative;
                cursor: pointer;
                display: flex;
                align-items: center;
                padding: 0 3px;
                transition: background .3s ease, box-shadow .3s ease, border-color .3s ease;
            }

            .theme-toggle-knob {
                width: 22px;
                height: 22px;
                border-radius: 50%;
                background: var(--toggle-amber);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                transform: translateX(0);
                transition: transform .3s cubic-bezier(.4, 0, .2, 1), box-shadow .3s ease, background .3s ease;
            }

            body.dark-mode .theme-toggle-knob {
                transform: translateX(24px);
            }

            html[dir="rtl"] body.dark-mode .theme-toggle-knob {
                transform: translateX(-24px);
            }

            .coolfix-lang-btn {
                background-color: #ffffff;
                color: #1A444E;
                font-weight: 600;
                font-size: 13px;
                padding: 3px 14px;
                border: 1px solid #E2E8F0;
                border-radius: 20px;
                cursor: pointer;
                white-space: nowrap;
                flex-shrink: 0;
                transition: ease 0.3s all;
            }

            .coolfix-lang-btn:hover {
                background-color: #013e37;
                color: #fff;
            }

            #navigation {
                position: relative;
            }

            .cfx-burger {
                width: 42px;
                height: 42px;
                flex-shrink: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 5px;
                padding: 10px;
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 12px;
                cursor: pointer;
                transition: all .3s ease;
            }

            .cfx-burger span {
                display: block;
                height: 2.5px;
                width: 100%;
                background: #013e37;
                border-radius: 2px;
                transition: transform .25s, opacity .25s, background .3s;
            }

            .cfx-burger.open span:nth-child(1) {
                transform: translateY(7.5px) rotate(45deg);
            }

            .cfx-burger.open span:nth-child(2) {
                opacity: 0;
            }

            .cfx-burger.open span:nth-child(3) {
                transform: translateY(-7.5px) rotate(-45deg);
            }

            .cfx-mobile-menu {
                display: none;
                background: #fff;
                padding: 8px 20px 16px;
                box-shadow: 0 12px 24px rgba(0, 0, 0, .08);
                border-top: 1px solid #eee;
            }

            .cfx-mobile-menu.open {
                display: block;
            }

            .cfx-mobile-menu a {
                display: block;
                padding: 12px 0;
                font-weight: 600;
                color: #013e37;
                border-bottom: 1px solid #f0f0f0;
            }

            .cfx-mobile-menu a:last-child {
                border-bottom: 0;
            }

            @media (min-width: 992px) {

                .cfx-mobile-menu,
                .cfx-mobile-menu.open {
                    display: none !important;
                }
            }

            @media (max-width: 575px) {
                #navigation {
                    padding: 12px 0;
                }

                .navbar-buttons-wrapper {
                    gap: 6px !important;
                }

                .coolfix-lang-btn {
                    padding: 3px 10px;
                    font-size: 12px;
                }

                .site-logo {
                    width: 110px;
                }
            }

            /* =====================================================================
               SCROLL SWAP: الهيدرين الأصليين يختفون، والمختصر ينزل من فوق
               ===================================================================== */
            .logo-contact,
            #navigation {
                transition: opacity .3s ease, visibility .3s ease;
            }

            body.cfx-scrolled .logo-contact,
            body.cfx-scrolled #navigation,
            body.cfx-scrolled .cfx-mobile-menu {
                opacity: 0;
                visibility: hidden;
                pointer-events: none;
            }

            .cfx-sticky {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 99998;
                background: rgba(255, 255, 255, .94);
                -webkit-backdrop-filter: blur(14px);
                backdrop-filter: blur(14px);
                border-bottom: 1px solid #e2e8f0;
                box-shadow: 0 10px 34px rgba(1, 62, 55, .14);
                transform: translateY(-115%);
                visibility: hidden;
                transition: transform .45s cubic-bezier(.2, .8, .2, 1), visibility 0s linear .45s, background .3s, box-shadow .3s, border-color .3s;
            }

            body.cfx-scrolled .cfx-sticky {
                transform: translateY(0);
                visibility: visible;
                transition: transform .45s cubic-bezier(.2, .8, .2, 1), visibility 0s, background .3s, box-shadow .3s, border-color .3s;
            }

            .cfx-sticky .cfx-sticky-in {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 18px;
                height: 66px;
            }

            .cfx-sticky .cfx-sticky-logo img {
                height: 38px;
                width: auto;
                display: block;
            }

            .cfx-sticky .cfx-sticky-nav {
                display: none;
                align-items: center;
                gap: 4px;
            }

            .cfx-sticky .cfx-sticky-nav a {
                position: relative;
                padding: 8px 12px;
                font-size: .92rem;
                font-weight: 600;
                color: #013e37;
                text-decoration: none;
                border-radius: 10px;
                transition: color .25s, background .25s, text-shadow .25s;
            }

            .cfx-sticky .cfx-sticky-nav a::after {
                content: "";
                position: absolute;
                left: 12px;
                right: 12px;
                bottom: 3px;
                height: 2px;
                border-radius: 2px;
                background: #FEC961;
                transform: scaleX(0);
                transition: transform .3s ease;
            }

            .cfx-sticky .cfx-sticky-nav a:hover::after,
            .cfx-sticky .cfx-sticky-nav a.active::after {
                transform: scaleX(1);
            }

            .cfx-sticky .cfx-sticky-nav a:hover {
                background: rgba(1, 62, 55, .06);
            }

            .cfx-sticky .cfx-sticky-tools {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .cfx-sticky .cfx-sticky-logout {
                display: none;
                align-items: center;
                gap: 8px;
                padding: 7px 18px;
                font-size: .88rem;
                font-weight: 600;
                color: #013e37;
                border: 1.5px solid #013e37;
                border-radius: 50px;
                text-decoration: none;
                white-space: nowrap;
                transition: all .3s ease;
            }

            .cfx-sticky .cfx-sticky-logout:hover {
                background: #013e37;
                color: #fff;
            }

            .cfx-sticky .cfx-sticky-lang {
                display: none;
            }

            .cfx-sticky .cfx-sticky-burger {
                display: flex;
            }

            .cfx-sticky .cfx-sticky-menu {
                display: none;
                padding: 6px 20px 16px;
                border-top: 1px solid #eef2f1;
            }

            .cfx-sticky .cfx-sticky-menu.open {
                display: block;
            }

            .cfx-sticky .cfx-sticky-menu a {
                display: block;
                padding: 12px 0;
                font-weight: 600;
                color: #013e37;
                text-decoration: none;
                border-bottom: 1px solid #f0f0f0;
            }

            .cfx-sticky .cfx-sticky-menu a:last-child {
                border-bottom: 0;
            }

            .cfx-sticky .cfx-sticky-menu a.active {
                color: #b8860b;
            }

            @media (min-width: 576px) {
                .cfx-sticky .cfx-sticky-lang {
                    display: inline-block;
                }
            }

            @media (min-width: 768px) {
                .cfx-sticky .cfx-sticky-logout {
                    display: inline-flex;
                }
            }

            @media (min-width: 992px) {
                .cfx-sticky .cfx-sticky-nav {
                    display: flex;
                }

                .cfx-sticky .cfx-sticky-burger,
                .cfx-sticky .cfx-sticky-menu,
                .cfx-sticky .cfx-sticky-menu.open {
                    display: none !important;
                }
            }

            @media (prefers-reduced-motion: reduce) {

                .cfx-sticky,
                body.cfx-scrolled .cfx-sticky {
                    transition: none;
                }
            }

            /* =====================================================================
               ✨ NEON DARK MODE ✨  (الألوان اللامعة)
               ===================================================================== */
            body {
                transition: background-color .45s ease, color .45s ease;
            }

            body.dark-mode {
                background: #050b0a !important;
                color: #b7d9d2 !important;
            }

            /* headings glow */
            body.dark-mode h1,
            body.dark-mode h2,
            body.dark-mode h3,
            body.dark-mode h4,
            body.dark-mode h5,
            body.dark-mode h6 {
                color: #eafffa;
                text-shadow: 0 0 14px rgba(45, 255, 196, .38), 0 0 34px rgba(45, 255, 196, .16);
            }

            body.dark-mode p,
            body.dark-mode li,
            body.dark-mode small,
            body.dark-mode label {
                color: #a6cbc3;
            }

            body.dark-mode a {
                color: var(--neon-soft);
                transition: color .25s, text-shadow .25s;
            }

            body.dark-mode a:hover {
                color: var(--neon-amber);
                text-shadow: 0 0 12px rgba(255, 209, 102, .75);
            }

            /* top contact strip + navbar */
            body.dark-mode .logo-contact {
                background: #030f0d !important;
                border-bottom: 1px solid rgba(45, 255, 196, .18);
            }

            body.dark-mode .single-top-contact i,
            body.dark-mode .top_social_profile li {
                color: var(--neon);
                text-shadow: 0 0 12px rgba(45, 255, 196, .85);
            }

            body.dark-mode .single-top-contact h4,
            body.dark-mode .single-top-contact h4 a {
                color: #d8fff6;
            }

            body.dark-mode #navigation {
                background: #07110f !important;
                border-bottom: 1px solid rgba(45, 255, 196, .3);
                box-shadow: 0 8px 36px rgba(45, 255, 196, .12);
            }

            body.dark-mode #main-menu a {
                color: #cffff4;
                font-weight: 600;
            }

            body.dark-mode #main-menu a:hover {
                color: var(--neon-amber);
                text-shadow: 0 0 14px rgba(255, 209, 102, .8);
            }

            body.dark-mode .site-logo img,
            body.dark-mode .cfx-sticky .cfx-sticky-logo img,
            body.dark-mode .footer img {
                filter: brightness(1.7) saturate(1.3) drop-shadow(0 0 9px rgba(45, 255, 196, .6));
            }

            /* toggle switch / language / burger / mobile menu */
            body.dark-mode .theme-toggle-switch {
                background: #0b2420;
                border-color: rgba(45, 255, 196, .6);
                box-shadow: 0 0 14px rgba(45, 255, 196, .5), inset 0 0 8px rgba(45, 255, 196, .25);
            }

            body.dark-mode .theme-toggle-knob {
                background: var(--neon-amber);
                box-shadow: 0 0 12px #ffd166, 0 0 28px rgba(255, 209, 102, .65);
            }

            body.dark-mode .coolfix-lang-btn {
                background: transparent;
                color: var(--neon);
                border-color: rgba(45, 255, 196, .55);
                box-shadow: 0 0 12px rgba(45, 255, 196, .25);
            }

            body.dark-mode .coolfix-lang-btn:hover {
                background: var(--neon);
                color: #032a24;
                box-shadow: 0 0 22px rgba(45, 255, 196, .85);
            }

            body.dark-mode .cfx-burger {
                background: #0b1c1a;
                border-color: rgba(45, 255, 196, .5);
                box-shadow: 0 0 12px rgba(45, 255, 196, .3);
            }

            body.dark-mode .cfx-burger span {
                background: var(--neon);
                box-shadow: 0 0 8px rgba(45, 255, 196, .9);
            }

            body.dark-mode .cfx-mobile-menu {
                background: #07110f;
                border-top-color: rgba(45, 255, 196, .25);
                box-shadow: 0 14px 34px rgba(45, 255, 196, .12);
            }

            body.dark-mode .cfx-mobile-menu a {
                color: #cffff4;
                border-bottom-color: rgba(45, 255, 196, .12);
            }

            /* buttons */
            body.dark-mode .btn_two,
            body.dark-mode a.btn_two {
                background: transparent !important;
                color: var(--neon) !important;
                border: 2px solid var(--neon) !important;
                box-shadow: 0 0 16px rgba(45, 255, 196, .55), inset 0 0 12px rgba(45, 255, 196, .2);
                text-shadow: 0 0 8px rgba(45, 255, 196, .8);
            }

            body.dark-mode .btn_two:hover {
                background: var(--neon) !important;
                color: #032a24 !important;
                text-shadow: none;
                box-shadow: 0 0 28px rgba(45, 255, 196, .95);
            }

            /* الحالة العادية: غامق بدون أي مربع أو توهج */
            body.dark-mode .cta,
            body.dark-mode .btn_two,
            body.dark-mode .btn-primary {
                background: #03c2a6 !important;
                color: #024435 !important;
                border: 1px solid rgba(45, 255, 207, .25) !important;
                border-radius: 50px !important;
                box-shadow: none !important;
                text-shadow: none;
                transition: background .3s ease, box-shadow .3s ease, color .3s ease, border-color .3s ease;
            }

            //--------------/* ===== كروت الخدمات - دارك نيون (كامل) ===== */

            /* 1) الكرت: أسود + إطار مضيء */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) {
                background: #050909 !important;
                background-image: none !important;
                border: 1px solid rgba(45, 255, 207, .45) !important;
                box-shadow: 0 0 16px rgba(45, 255, 207, .22) !important;
                border-radius: 14px;
                overflow: hidden;
                transition: box-shadow .3s ease, transform .3s ease;
            }

            /* 2) الهفر: على الكرت نفسه فقط */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]):hover {
                box-shadow: 0 0 30px rgba(45, 255, 207, .55) !important;
                transform: translateY(-4px);
            }

            /* 3) كل اللي جوا الكرت: بدون أبيض، بدون كريمي، بدون تدرجات، بدون ظلال */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) *,
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) *::before,
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) *::after {
                background-color: transparent !important;
                background-image: none !important;
                box-shadow: none !important;
                filter: none;
            }

            /* 4) القسم العلوي (الأيقونة) غامق مضيء بدل الكريمي */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"])> :first-child {
                background-image: linear-gradient(135deg, #0d2b27, #050909) !important;
            }

            /* 5) الهفر اللي طلع بالنص (Book This Service): أسود بدل الأبيض */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"])> :not(:first-child) {
                background-color: #050909 !important;
            }

            /* 6) النصوص */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) p,
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) span,
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) li {
                color: #c9fff1 !important;
            }

            /* 7) العناوين */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) :is(h1, h2, h3, h4, h5, h6),
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) :is(h3, h4) a {
                color: #2dffcf !important;
                text-shadow: 0 0 8px rgba(45, 255, 207, .6);
            }

            /* 8) الأيقونات (مفتاح، ثلج، قطرة، صاعقة) */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) :is(i, svg) {
                color: #2dffcf !important;
                fill: currentColor;
                filter: drop-shadow(0 0 8px rgba(45, 255, 207, .8));
            }

            /* 9) النجوم ذهبية */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) [class*="star"],
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) [class*="star"] i {
                color: #fbbf24 !important;
                filter: drop-shadow(0 0 6px rgba(251, 191, 36, .7));
            }

            /* 10) التاغ (Major Repairs) كبسولة */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) :is([class*="tag"], [class*="cat"], [class*="badge"]):not(:has(*)) {
                display: inline-block;
                width: auto !important;
                background-color: rgba(45, 255, 207, .12) !important;
                color: #2dffcf !important;
                border: 1px solid rgba(45, 255, 207, .5);
                border-radius: 20px;
                padding: 4px 14px;
            }

            /* 11) السعر (From ₪60) */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) [class*="price"] {
                background-color: #013e37 !important;
                color: #2dffcf !important;
                box-shadow: 0 0 14px rgba(45, 255, 207, .5) !important;
            }

            /* 12) رابط Book This Service */
            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) a {
                color: #2dffcf !important;
            }

            body.dark-mode .row>[class*="col"]>div:has([class*="price"]) a:hover {
                color: #fff !important;
                text-shadow: 0 0 10px #2dffcf;
            }

            //--------------
            /* عند الهفر: يضوي */
            body.dark-mode .cta:hover,
            body.dark-mode .btn_two:hover,
            body.dark-mode .btn-primary:hover {
                background: linear-gradient(135deg, #00d9a6, #2dffcf) !important;
                color: #022 !important;
                border-color: #2dffcf !important;
                box-shadow: 0 0 14px rgba(45, 255, 207, .8), 0 0 34px rgba(45, 255, 207, .4) !important;
            }

            /* السهم جوا الزر يتبع لون النص */
            body.dark-mode .cta svg path,
            body.dark-mode .cta svg polyline {
                stroke: currentColor;
            }

            body.dark-mode .cta span {
                color: #032a24 !important;
            }

            body.dark-mode .cta svg {
                stroke: #032a24;
            }

            /* sections & cards */
            body.dark-mode section:not(.section-top):not(.logo-contact),
            body.dark-mode .section-padding {
                background-color: #060e0d !important;
            }

            body.dark-mode [class*="single_"]:not(.single_footer),
            body.dark-mode .contact,
            body.dark-mode .card,
            body.dark-mode .accordion-item {
                background-color: #0a1716 !important;
                border-color: rgba(45, 255, 196, .25) !important;
                box-shadow: 0 0 0 1px rgba(45, 255, 196, .08), 0 0 28px rgba(45, 255, 196, .08);
            }

            body.dark-mode [class*="single_"]:not(.single_footer):hover {
                box-shadow: 0 0 26px rgba(45, 255, 196, .35);
            }

            body.dark-mode [class*="single_"] i,
            body.dark-mode [class*="single_"] [class^="ti-"],
            body.dark-mode [class*="single_"] [class*=" ti-"] {
                color: var(--neon);
                text-shadow: 0 0 14px rgba(45, 255, 196, .8);
            }

            /* forms */
            body.dark-mode input:not([type="checkbox"]):not([type="radio"]),
            body.dark-mode textarea,
            body.dark-mode select,
            body.dark-mode .form-control {
                background-color: #0a1715 !important;
                color: #eafffa !important;
                border: 1px solid rgba(45, 255, 196, .28) !important;
            }

            body.dark-mode input::placeholder,
            body.dark-mode textarea::placeholder {
                color: #5f8a82 !important;
            }

            body.dark-mode input:focus,
            body.dark-mode textarea:focus,
            body.dark-mode select:focus {
                border-color: var(--neon) !important;
                box-shadow: 0 0 0 3px rgba(45, 255, 196, .15), 0 0 22px rgba(45, 255, 196, .45) !important;
                outline: 0;
            }

            /* footer */
            body.dark-mode .footer {
                background: #030a09 !important;
                border-top: 1px solid rgba(45, 255, 196, .3);
                box-shadow: 0 -10px 50px rgba(45, 255, 196, .08);
            }

            body.dark-mode .footer h3,
            body.dark-mode .footer h4 {
                color: var(--neon);
                text-shadow: 0 0 14px rgba(45, 255, 196, .6);
            }

            body.dark-mode .footer a {
                color: #9fd8cc;
            }

            body.dark-mode .footer a:hover {
                color: var(--neon-amber);
            }

            body.dark-mode .foot_social a {
                box-shadow: 0 0 12px rgba(45, 255, 196, .3);
            }

            body.dark-mode .footer_copyright p {
                color: #7aa8a0;
            }

            /* sticky header (dark) */
            body.dark-mode .cfx-sticky {
                background: rgba(5, 11, 10, .9);
                border-bottom: 1px solid rgba(45, 255, 196, .4);
                box-shadow: 0 10px 40px rgba(45, 255, 196, .18);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-nav a {
                color: #cffff4;
            }

            body.dark-mode .cfx-sticky .cfx-sticky-nav a:hover {
                color: var(--neon-amber);
                background: rgba(45, 255, 196, .07);
                text-shadow: 0 0 12px rgba(255, 209, 102, .8);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-nav a::after {
                background: var(--neon);
                box-shadow: 0 0 10px var(--neon);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-nav a.active {
                color: var(--neon);
                text-shadow: 0 0 12px rgba(45, 255, 196, .8);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-logout {
                color: var(--neon);
                border-color: var(--neon);
                box-shadow: 0 0 14px rgba(45, 255, 196, .5), inset 0 0 10px rgba(45, 255, 196, .15);
                text-shadow: 0 0 8px rgba(45, 255, 196, .8);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-logout:hover {
                background: var(--neon);
                color: #032a24;
                text-shadow: none;
            }

            body.dark-mode .cfx-sticky .cfx-sticky-menu {
                border-top-color: rgba(45, 255, 196, .2);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-menu a {
                color: #cffff4;
                border-bottom-color: rgba(45, 255, 196, .12);
            }

            body.dark-mode .cfx-sticky .cfx-sticky-menu a.active {
                color: var(--neon);
            }

            /* thin neon scrollbar */
            body.dark-mode {
                scrollbar-color: #2dffc4 #050b0a;
            }

            body.dark-mode ::selection {
                background: rgba(45, 255, 196, .35);
                color: #fff;
            }

            /* ===== الأزرار: غامق قبل الهفر، نيون بعده ===== */

            body.dark-mode .btn,
            body.dark-mode .btn_two,
            body.dark-mode .btn-primary,
            body.dark-mode .cta,
            body.dark-mode .coolfix-lang-btn,
            body.dark-mode .call_to_action a {
                background: #0b3b34 !important;
                background-image: none !important;
                color: #2dffcf !important;
                border: 1px solid rgba(45, 255, 207, .45) !important;
                border-radius: 50px !important;
                box-shadow: none !important;
                text-shadow: none;
                transition: background .3s ease, color .3s ease, box-shadow .3s ease, border-color .3s ease;
            }

            body.dark-mode .btn:hover,
            body.dark-mode .btn_two:hover,
            body.dark-mode .btn-primary:hover,
            body.dark-mode .cta:hover,
            body.dark-mode .coolfix-lang-btn:hover,
            body.dark-mode .call_to_action a:hover {
                background: linear-gradient(135deg, #00d9a6, #2dffcf) !important;
                color: #022 !important;
                border-color: #2dffcf !important;
                box-shadow: 0 0 14px rgba(45, 255, 207, .8), 0 0 32px rgba(45, 255, 207, .4) !important;
            }

            /* إزالة أي مربع زيادة من القالب خلف الزر */
            body.dark-mode .cta::before,
            body.dark-mode .cta::after,
            body.dark-mode .btn::before,
            body.dark-mode .btn::after {
                background: transparent !important;
                box-shadow: none !important;
            }

            /* السهم يتبع لون النص */
            body.dark-mode .cta svg path,
            body.dark-mode .cta svg polyline {
                stroke: currentColor !important;
                background: none !important;
            }

            /* حاوية الزر بدون خلفية */
            body.dark-mode .cta_two,
            body.dark-mode .call_to_action {
                background: transparent !important;
                box-shadow: none !important;
            }

            a.coolfix-lang-btn {
                display: inline-block;
                text-decoration: none;
            }

            html[lang="ar"] body,
            html[lang="ar"] :is(h1, h2, h3, h4, h5, h6, p, a, li, button, input, textarea, label, small, em, strong):not([class*="fa-"]):not([class*="ti-"]) {
                font-family: 'Cairo', sans-serif;
            }

            html[dir="rtl"] body {
                text-align: right;
            }

            html[dir="rtl"] .cta svg,
            html[dir="rtl"] .fa-arrow-right {
                transform: scaleX(-1);
            }

            #main-menu ul {
                flex-wrap: nowrap;
                white-space: nowrap;
            }

            #main-menu a {
                padding-inline: 8px !important;
                font-size: 15px;
            }

            html[dir="rtl"] #main-menu a {
                font-size: 14px;
            }

            .preloaders .loader,
            .preloaders .loader::before,
            .preloaders .loader::after {
                text-shadow: none !important;
                -webkit-text-stroke: 0 !important;
                filter: none !important;
                animation: none !important;
            }

            .preloaders .loader::before,
            .preloaders .loader::after {
                content: none !important;
            }

            body.cfx-scrolled .logo-contact,
            body.cfx-scrolled #navigation,
            body.cfx-scrolled .cfx-mobile-menu {
                visibility: hidden;
                pointer-events: none;

                .top_header_banner {
                    overflow: visible;
                }
            }

            /* ===== زر "اعرف المزيد" / أي زر نصه غامق داخل الكروت ===== */
            body.dark-mode .single_feature_one a,
            body.dark-mode .single_tp a,
            body.dark-mode [class*="single_"] a.cta,
            body.dark-mode [class*="single_"] a.cta span,
            body.dark-mode .cta span {
                color: #2dffcf !important;
                text-shadow: none !important;
            }

            body.dark-mode .cta:hover span,
            body.dark-mode [class*="single_"] a.cta:hover span {
                color: #022 !important;
            }

            /* ===== كروت العدادات (15 / 100 / 8) ===== */
            body.dark-mode .single-counter,
            body.dark-mode .count_one,
            body.dark-mode .count_two,
            body.dark-mode .count_three,
            body.dark-mode .count_four {
                background: #0a1716 !important;
                border: 1px solid rgba(45, 255, 196, .35) !important;
                box-shadow: 0 0 22px rgba(45, 255, 196, .12) !important;
            }

            body.dark-mode .single-counter h1,
            body.dark-mode .single-counter h2,
            body.dark-mode .single-counter h3,
            body.dark-mode .single-counter .counter,
            body.dark-mode .single-counter span.counter {
                color: #2dffcf !important;
                background: transparent !important;
                text-shadow: 0 0 14px rgba(45, 255, 196, .6) !important;
            }

            body.dark-mode .single-counter p,
            body.dark-mode .single-counter span,
            body.dark-mode .single-counter i {
                color: #c9fff1 !important;
                background: transparent !important;
            }

            /* ===== هيدر الصفحات الداخلية (من نحن، الخدمات...) ===== */
            body.dark-mode .section-top {
                background: linear-gradient(135deg, #07110f, #0b2420) !important;
                border-bottom: 1px solid rgba(45, 255, 196, .25);
            }

            body.dark-mode .section-top-title h1 {
                color: #2dffcf !important;
                text-shadow: 0 0 18px rgba(45, 255, 196, .55) !important;
            }

            body.dark-mode .section-top-title ul {
                background: #0a1716 !important;
                border: 1px solid rgba(45, 255, 196, .4) !important;
                box-shadow: 0 0 16px rgba(45, 255, 196, .2);
            }

            body.dark-mode .section-top-title ul li,
            body.dark-mode .section-top-title ul li a {
                color: #c9fff1 !important;
            }

            body.dark-mode .section-top-title ul li a:hover {
                color: #ffd166 !important;
            }

            /* ===== كروت الأسعار (صفحة Pricing) ===== */
            body.dark-mode .pricing_design .single-pricing,
            body.dark-mode .single-pricing,
            body.dark-mode .single-pricing-card {
                background: #0a1716 !important;
                border: 1px solid rgba(45, 255, 196, .4) !important;
                box-shadow: 0 0 22px rgba(45, 255, 196, .15) !important;
            }

            body.dark-mode .pricing_design .single-pricing::before {
                background: #050909 !important;
                border-color: rgba(45, 255, 196, .25) !important;
            }

            body.dark-mode .single-pricing h1,
            body.dark-mode .single-pricing h2,
            body.dark-mode .single-pricing h3,
            body.dark-mode .single-pricing-card h1,
            body.dark-mode .single-pricing-card h3 {
                color: #2dffcf !important;
                text-shadow: 0 0 12px rgba(45, 255, 196, .5) !important;
            }

            body.dark-mode .single-pricing p,
            body.dark-mode .single-pricing span,
            body.dark-mode .single-pricing li,
            body.dark-mode .single-pricing-card p,
            body.dark-mode .single-pricing-card li {
                color: #c9fff1 !important;
                background: transparent !important;
            }

            body.dark-mode .single-pricing ul li span,
            body.dark-mode .single-pricing-card .list li i {
                background: rgba(45, 255, 196, .15) !important;
                color: #2dffcf !important;
            }

            body.dark-mode .price-head {
                background: #0b2420 !important;
            }

            body.dark-mode .price-head h1,
            body.dark-mode .price-head h2,
            body.dark-mode .price-head span {
                color: #ffd166 !important;
            }

            /* ===== FAQ ===== */
            body.dark-mode .accordion-item,
            body.dark-mode .accordion-header,
            body.dark-mode .accordion-button,
            body.dark-mode .accordion-body {
                background: #0a1716 !important;
                color: #c9fff1 !important;
                border-color: rgba(45, 255, 196, .35) !important;
                box-shadow: none !important;
            }

            body.dark-mode .accordion-item {
                box-shadow: 0 0 16px rgba(45, 255, 196, .12) !important;
            }

            body.dark-mode .accordion-button,
            body.dark-mode .accordion-button:not(.collapsed) {
                color: #2dffcf !important;
                text-shadow: none !important;
            }

            body.dark-mode .accordion-button::after {
                filter: invert(1) brightness(2);
            }

            body.dark-mode .accordion-body {
                color: #c9fff1 !important;
                border-inline-start: 3px solid #2dffcf;
            }

            a[href^="tel:"],
            .single-top-contact h4 a,
            .sf_contact p,
            .cta span.phone,
            .ltr-num {
                direction: ltr;
                unicode-bidi: isolate;
                display: inline-block;
            }

            .cta span {
                unicode-bidi: plaintext;
            }

            a[href^="tel:"] span {
                direction: ltr;
                unicode-bidi: isolate;
                display: inline-block;
            }

            /* كروت الإحصائيات العائمة فوق الصورة */
            body.dark-mode .home_ps,
            body.dark-mode .home_ps2 {
                background: #0a1716 !important;
                border: 1px solid rgba(45, 255, 196, .4) !important;
                box-shadow: 0 0 22px rgba(45, 255, 196, .2) !important;
            }

            body.dark-mode .home_ps h2,
            body.dark-mode .home_ps2 h2,
            body.dark-mode .home_ps h2 span,
            body.dark-mode .home_ps2 h2 span {
                color: #2dffcf !important;
                background: transparent !important;
                text-shadow: 0 0 12px rgba(45, 255, 196, .6) !important;
            }

            body.dark-mode .home_ps span,
            body.dark-mode .home_ps2 span {
                color: #c9fff1 !important;
                background: transparent !important;
            }

            body.dark-mode .team_member,
            body.dark-mode .team_page,
            body.dark-mode .testi_home_area,
            body.dark-mode .testimonial_area,
            body.dark-mode .owl-carousel,
            body.dark-mode .owl-stage-outer {
                background: #060e0d !important;
            }

            body.dark-mode .section-padding,
            body.dark-mode section {
                background-color: #060e0d !important;
            }

            body.dark-mode :has(> #team-slider),
            body.dark-mode :has(> .owl-carousel),
            body.dark-mode .container:has(#team-slider) {
                background: transparent !important;
            }

            body.dark-mode section:has(#team-slider),
            body.dark-mode div:has(> .container #team-slider) {
                background-color: #060e0d !important;
            }

            /* ===== كروت الآراء: دارك نيون ===== */
            body.dark-mode .testi_home_area {
                background: #060e0d !important;
            }

            body.dark-mode .testimonial {
                background: linear-gradient(160deg, #0b1f1c, #07110f) !important;
                border: 1px solid rgba(45, 255, 196, .35) !important;
                box-shadow: 0 0 0 1px rgba(45, 255, 196, .06), 0 0 28px rgba(45, 255, 196, .14) !important;
                transition: box-shadow .3s, transform .3s;
            }

            body.dark-mode .testimonial:hover {
                box-shadow: 0 0 36px rgba(45, 255, 196, .35) !important;
                transform: translateY(-4px);
            }

            /* الاسم: كان نيون على نيون فاختفى */
            body.dark-mode .testi_pic_title h4,
            body.dark-mode .testimonial_content h3 {
                color: #2dffcf !important;
                background: transparent !important;
                text-shadow: 0 0 10px rgba(45, 255, 196, .5) !important;
            }

            body.dark-mode .testi_pic_title small {
                color: #8fc9bd !important;
            }

            /* النص: كان رمادي باهت */
            body.dark-mode .testimonial p {
                color: #d6f6ee !important;
                text-shadow: none !important;
            }

            /* الصورة بإطار مضيء */
            body.dark-mode .testi_pic_title .pic img {
                border: 2px solid #2dffcf;
                box-shadow: 0 0 14px rgba(45, 255, 196, .6);
            }

            /* النجوم ذهبية متوهجة */
            body.dark-mode .testimonial i {
                color: #ffd166 !important;
                text-shadow: 0 0 8px rgba(255, 209, 102, .7) !important;
            }

            /* نقاط الكاروسيل */
            body.dark-mode .owl-theme .owl-controls .owl-page span,
            body.dark-mode .owl-theme .owl-dots .owl-dot span {
                background: rgba(45, 255, 196, .35) !important;
            }

            body.dark-mode .owl-theme .owl-controls .owl-page.active span,
            body.dark-mode .owl-theme .owl-dots .owl-dot.active span {
                background: #2dffcf !important;
                box-shadow: 0 0 10px #2dffcf;
            }

            /* ===== قسم الفريق: دارك نيون ===== */
            body.dark-mode section:has(#team-slider),
            body.dark-mode div:has(> .container #team-slider),
            body.dark-mode .team_member,
            body.dark-mode .team_page {
                background: #060e0d !important;
            }

            /* شيل الصندوق الأسود الزايد حول الكاروسيل */
            body.dark-mode #team-slider,
            body.dark-mode #team-slider .owl-wrapper-outer,
            body.dark-mode #team-slider .owl-stage-outer {
                background: transparent !important;
            }

            /* الكرت */
            body.dark-mode .our-team {
                background: #0a1716 !important;
                border: 1px solid rgba(45, 255, 196, .35) !important;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 0 24px rgba(45, 255, 196, .12) !important;
                transition: box-shadow .3s, transform .3s;
            }

            body.dark-mode .our-team:hover {
                box-shadow: 0 0 34px rgba(45, 255, 196, .35) !important;
                transform: translateY(-4px);
            }

            body.dark-mode .our-team .team-content {
                background: linear-gradient(180deg, #0a1716, #07110f) !important;
            }

            /* الاسم والمسمى */
            body.dark-mode .our-team .title {
                color: #2dffcf !important;
                text-shadow: 0 0 10px rgba(45, 255, 196, .5) !important;
            }

            body.dark-mode .our-team .title:before,
            body.dark-mode .our-team .title:after {
                background: #2dffcf !important;
            }

            body.dark-mode .our-team .post {
                color: #ffd166 !important;
                text-shadow: none !important;
            }

            body.dark-mode .our-team .post:before {
                background: #2dffcf !important;
            }

            /* صف الخبرة (سنوات / عدد الإصلاحات) */
            body.dark-mode .sth_det2,
            body.dark-mode .sth_det2 span,
            body.dark-mode .sth_det2 u {
                color: #c9fff1 !important;
                background: transparent !important;
                border-color: rgba(45, 255, 196, .2) !important;
            }

            body.dark-mode .sth_det2 i {
                color: #2dffcf !important;
            }

            /* أزرار الاتصال/واتساب على الصورة */
            body.dark-mode .our-team .social li a {
                background: #0b2420 !important;
                color: #2dffcf !important;
                box-shadow: 0 0 12px rgba(45, 255, 196, .5) !important;
            }

            /* نقاط الكاروسيل */
            body.dark-mode #team-slider .owl-dot span,
            body.dark-mode #team-slider .owl-controls .owl-page span {
                background: rgba(45, 255, 196, .3) !important;
            }

            body.dark-mode #team-slider .owl-dot.active span,
            body.dark-mode #team-slider .owl-controls .owl-page.active span {
                background: #2dffcf !important;
                box-shadow: 0 0 10px #2dffcf;
            }

            body.dark-mode .section-title h1,
            body.dark-mode .section-title h4 {
                color: #2dffcf !important;
                background: transparent !important;
            }

            body.dark-mode .section-title h1,
            body.dark-mode .section-title h4 {
                color: #2dffcf !important;
                background: transparent !important;
            }

            /* تحويل خلفية الصفحة كاملة والمساحات الفارغة في الأسفل إلى الأسود */
            html,
            body.dark-mode {
                background-color: #0b111e !important;
                background: #0b111e !important;
            }

            /* تأمين القسم السفلي (فوتر أو أي قسم يليه) ليصبح داكناً أيضاً */
            body.dark-mode footer,
            body.dark-mode .footer {
                background-color: #0b111e !important;
            }

            /* فرض الخلفية السوداء على أي شاشة تحميل متبقية في الدارك مود */
            body.dark-mode div[class*="load"],
            body.dark-mode div[id*="load"],
            body.dark-mode .loading,
            body.dark-mode #loading {
                background-color: #0b111e !important;
                background: #0b111e !important;
            }

            /* تلوين نص "Loading data..." ليصبح مضيئاً بالفسفوري أو الأبيض بدلاً من اللون الغامق */
            body.dark-mode div[class*="load"] h1,
            body.dark-mode div[class*="load"] h2,
            body.dark-mode div[class*="load"] h3,
            body.dark-mode div[class*="load"] p,
            body.dark-mode div[class*="load"] span,
            body.dark-mode .loading {
                color: #2dffcf !important;
                /* نفس لون اسم الفني الفسفوري المريح */
            }

            /* 1. الشاشة الخلفية الكاملة */
            .fridge-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: #0b111e;
                z-index: 99999;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                perspective: 1200px;
                transition: opacity 0.4s ease 0.6s, visibility 0s ease 1.0s;
            }

            /* 2. حاوية الثلاجة (شاشات الكمبيوتر واللاب توب) */
            .fridge-container {
                position: relative;
                width: 300px;
                height: 450px;
                background: #111827;
                border-radius: 20px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
                border: 3px solid #1f2937;
                display: flex;
            }

            /* 3. أبواب الثلاجة والمقابض */
            .fridge-door {
                position: absolute;
                top: 0;
                width: 50%;
                height: 100%;
                background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
                border: 1px solid #374151;
                z-index: 2;
                transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                backface-visibility: hidden;
                -webkit-backface-visibility: hidden;
            }

            .door-left {
                left: 0;
                border-radius: 16px 0 0 16px;
                transform-origin: left center;
            }

            .door-right {
                right: 0;
                border-radius: 0 16px 16px 0;
                transform-origin: right center;
            }

            .fridge-handle {
                position: absolute;
                top: 40%;
                width: 12px;
                height: 90px;
                background: linear-gradient(90deg, #2dffcf, #00cc99);
                box-shadow: 0 0 15px rgba(45, 255, 196, 0.6);
                border-radius: 6px;
            }

            .handle-left {
                right: 8px;
            }

            .handle-right {
                left: 8px;
            }

            /* 4. التصميم الداخلي والأنيميشن للكمبيوتر */
            .fridge-interior {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1;
                background: #0f172a;
                border-radius: 16px;
                overflow: hidden;
            }

            .fridge-light {
                position: absolute;
                width: 130%;
                height: 130%;
                background: radial-gradient(circle, rgba(45, 255, 196, 0.2) 0%, transparent 65%);
                opacity: 0;
                transition: opacity 0.3s ease 0.1s;
            }

            .fridge-logo {
                text-align: center;
                z-index: 3;
                width: 100%;
                padding: 0 10px;
            }

            .cool-text {
                font-size: 2.5rem;
                font-weight: 900;
                color: #2dffcf;
                text-shadow: 0 0 25px rgba(45, 255, 196, 0.9);
                letter-spacing: 4px;
                display: block;
                margin-bottom: 5px;
            }

            .loading-dots {
                display: flex;
                justify-content: center;
            }

            .loading-dots span {
                font-size: 1.1rem;
                color: #9ca3af;
                font-weight: 500;
                letter-spacing: 2px;
                animation: waveText 1.2s infinite ease-in-out;
            }

            .loading-dots span:nth-child(1) {
                animation-delay: 0.1s;
            }

            .loading-dots span:nth-child(2) {
                animation-delay: 0.2s;
            }

            .loading-dots span:nth-child(3) {
                animation-delay: 0.3s;
            }

            .loading-dots span:nth-child(4) {
                animation-delay: 0.4s;
            }

            .loading-dots span:nth-child(5) {
                animation-delay: 0.5s;
            }

            .loading-dots span:nth-child(6) {
                animation-delay: 0.6s;
            }

            .loading-dots span:nth-child(7) {
                animation-delay: 0.7s;
            }

            .loading-dots span:nth-child(8) {
                animation-delay: 0.8s;
            }

            .loading-dots span:nth-child(9) {
                animation-delay: 0.9s;
            }

            .loading-dots span:nth-child(10) {
                animation-delay: 1.0s;
            }

            @keyframes waveText {

                0%,
                100% {
                    transform: translateY(0);
                    color: #9ca3af;
                }

                50% {
                    transform: translateY(-6px);
                    color: #2dffcf;
                    text-shadow: 0 0 8px rgba(45, 255, 196, 0.5);
                }
            }

            /* 5. قواعد تشغيل الحركة الافتراضية (تفتح بزاوية كاملة للكمبيوتر) */
            .fridge-overlay.loaded .door-left {
                transform: rotateY(-135deg);
            }

            .fridge-overlay.loaded .door-right {
                transform: rotateY(135deg);
            }

            .fridge-overlay.loaded .fridge-light {
                opacity: 1;
            }

            .fridge-overlay.loaded {
                opacity: 0;
                visibility: hidden;
            }

            /* 6. 📱 كود الجوال النهائي الصارم (يوضع في نهاية الملف تماماً ليفرص قوته) 📱 */
            @media (max-width: 768px) {
                .fridge-container {
                    width: 250px !important;
                    height: 380px !important;
                    max-width: 85vw !important;
                    max-height: 75vh !important;
                }

                .cool-text {
                    font-size: 1.7rem !important;
                    letter-spacing: 2px !important;
                }

                .loading-dots span {
                    font-size: 0.85rem !important;
                }

                .fridge-handle {
                    height: 60px !important;
                    top: 42% !important;
                }

                /* زوايا دوران مخصصة للجوال لحل مشكلة الإخفاء في طور التصفح */
                .fridge-overlay.loaded .door-left {
                    transform: rotateY(-95deg) !important;
                }

                .fridge-overlay.loaded .door-right {
                    transform: rotateY(95deg) !important;
                }
            }
        </style>

        @yield('content')
        <!-- START FOOTER -->
        <div class="footer section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                        <div class="single_footer">
                            <a href="index.html"><img src="{{ asset('webfront/images/brand/logo.svg') }}"
                                    alt="COOLFIX"></a>
                            <p>{{ __('COOLFIX has been keeping homes and businesses in Gaza cool for years, with fast, honest refrigerator and cooling repair you can trust.') }}
                            </p>
                        </div>
                        <div class="foot_social">
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100010037628573&locale=ar_AR"
                                        class="top_f_facebook"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/@Mohamed.123."
                                        class="fa-brands fa-youtube"><i></i></a>
                                </li>

                                <li><a href="https://wa.me" class="top_f_twitter"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/abo______kareem/" class="top_f_instagram"><i
                                            class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li><a href="#" class="top_f_linkedin"><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-2 col-sm-6 col-xs-12 home-stagger-item">
                        <div class="single_footer">
                            <h4>{{ __('Services') }}</h4>
                            <ul>
                                <li><a href="{{ asset('/services') }}">{{ __('Fridge Repair') }}</a></li>
                                <li><a href="{{ asset('/services') }}">{{ __('Freezer Repair') }}</a></li>
                                <li><a href="{{ asset('/services') }}">{{ __('Gas Refill (Freon)') }}</a></li>
                                <li><a href="{{ asset('/services') }}">{{ __('Compressor Replacement') }}</a></li>
                                <li><a href="{{ asset('/services') }}">{{ __('Preventive Maintenance') }}</a></li>
                                <li><a href="{{ asset('/services') }}">{{ __('Commercial Cooling') }}</a></li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-2 col-sm-6 col-xs-12 home-stagger-item">
                        <div class="single_footer">
                            <h4>{{ __('Company') }}</h4>
                            <ul>
                                <li><a href="{{ url('index') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ url('/about') }}">{{ __('About Us') }}</a></li>
                                <li><a href="{{ url('/services') }}">{{ __('Services') }}</a></li>
                                <li><a href="{{ url('/pricing') }}">{{ __('Pricing') }}</a></li>
                                <li><a href="{{ url('/faq') }}">{{ __('FAQ') }}</a></li>
                                <li><a href="{{ url('/contact') }}">{{ __('Contact') }}</a></li>
                                <li><a href="{{ url('/data') }}">{{ __('data') }}</a></li>

                            </ul>
                        </div>

                    </div><!--- END COL -->
                    <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                        <div class="single_footer">
                            <h4>{{ __('Contact Info') }}</h4>
                            <div class="sf_contact">
                                <span class="ti-mobile"></span>
                                <h3>{{ __('Phone / WhatsApp') }}</h3>
                                <p>059 892 4040</p>
                            </div>
                            <div class="sf_contact">
                                <span class="ti-email"></span>
                                <h3>{{ __('Email Address') }}</h3>
                                <p>mohammedkareem@gmail.com</p>
                            </div>
                            <div class="sf_contact">
                                <span class="ti-map"></span>
                                <h3>{{ __('Workshop Address') }}</h3>
                                <p>{{ __('End of Omar Al-Mukhtar St., Gaza') }}</p>
                            </div>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-2 col-sm-6 col-xs-12 home-stagger-item">
                        <div class="single_footer">
                            <h4>{{ __('Working Hours') }}</h4>
                            <ul>
                                <li>{{ __('Sat - Thu: 8:00 AM - 8:00 PM') }}</li>
                                <li>{{ __('Friday: Emergency calls only') }}</li>
                            </ul>
                            <div class="cta_two" style="margin-top:20px;">
                                <a href="tel:+970598924040" class="cta"><span>{{ __('Call Now') }}</span>
                                    <svg width="13px" height="10px" viewBox="0 0 13 10">
                                        <path d="M1,5 L11,5"></path>
                                        <polyline points="8 1 12 5 8 9"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
                <div class="row fc">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="footer_copyright">
                            <p>&copy; 2026 COOLFIX. {{ __('All Rights Reserved.') }}
                                {{ __('Mohammed Kareem Kohail — Gaza, Palestine.') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">{{ __('Terms of use') }}</a></li>
                                <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                            </ul>
                        </div>
                    </div><!-- END COL -->
                </div>
            </div><!--- END CONTAINER -->
        </div>
        <!-- END FOOTER -->

        <!-- ===================== THEME TOGGLE (يشتغل على كل الصفحات وعلى الزرين) ===================== -->

        <script>
            (function() {
                function applyTheme(theme) {
                    var dark = theme === 'dark';
                    document.body.classList.toggle('dark-mode', dark);
                    document.querySelectorAll('.theme-toggle-knob').forEach(function(k) {
                        k.textContent = dark ? '🌙' : '☀️';
                    });
                    try {
                        localStorage.setItem('coolfix_theme', theme);
                    } catch (e) {}
                }

                function toggle() {
                    applyTheme(document.body.classList.contains('dark-mode') ? 'light' : 'dark');
                }

                var saved = 'light';
                try {
                    saved = localStorage.getItem('coolfix_theme') || 'light';
                } catch (e) {}
                applyTheme(saved);

                document.querySelectorAll('.theme-toggle-switch').forEach(function(sw) {
                    sw.addEventListener('click', toggle);
                    sw.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            toggle();
                        }
                    });
                });
            })();
        </script>

        <!-- ===================== MOBILE MENUS + SCROLL SWAP ===================== -->
        <script>
            (function() {
                /* القائمة الأصلية للجوال */
                var burger = document.getElementById('cfxBurger');
                var menu = document.getElementById('cfxMobileMenu');
                if (burger && menu) {
                    burger.addEventListener('click', function() {
                        var open = menu.classList.toggle('open');
                        burger.classList.toggle('open', open);
                        burger.setAttribute('aria-expanded', open);
                    });
                }

                /* قائمة الهيدر المختصر */
                var sBar = document.getElementById('cfxStickyBar');
                var sBurger = sBar ? sBar.querySelector('.cfx-sticky-burger') : null;
                var sMenu = document.getElementById('cfxStickyMenu');

                function closeStickyMenu() {
                    if (sMenu) sMenu.classList.remove('open');
                    if (sBurger) {
                        sBurger.classList.remove('open');
                        sBurger.setAttribute('aria-expanded', 'false');
                    }
                }
                if (sBurger && sMenu) {
                    sBurger.addEventListener('click', function() {
                        var open = sMenu.classList.toggle('open');
                        sBurger.classList.toggle('open', open);
                        sBurger.setAttribute('aria-expanded', open);
                    });
                }


                /* عند النزول: الهيدرين الأصليين يختفون والمختصر ينزل من فوق */
                var THRESHOLD = 160;
                var ticking = false;

                function onScroll() {
                    var y = window.pageYOffset || document.documentElement.scrollTop || 0;
                    var scrolled = y > THRESHOLD;
                    document.body.classList.toggle('cfx-scrolled', scrolled);
                    if (sBar) sBar.setAttribute('aria-hidden', scrolled ? 'false' : 'true');
                    if (!scrolled) closeStickyMenu();
                    ticking = false;
                }
                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(onScroll);
                        ticking = true;
                    }
                }, {
                    passive: true
                });
                onScroll();
            })();
        </script>

        <!-- Latest jQuery -->
        <!-- Latest compiled and minified Bootstrap -->
        <script src="{{ asset('webfront/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- owl-carousel min js  -->
        <script src="{{ asset('webfront/owlcarousel/js/owl.carousel.min.js') }}"></script>
        <!-- jquery-simple-mobilemenu.min -->
        <script src="{{ asset('webfront/js/jquery-simple-mobilemenu.js') }}"></script>
        <!-- magnific-popup js -->
        <script src="{{ asset('webfront/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- jquery mixitup min js -->
        <script src="{{ asset('webfront/js/jquery.mixitup.js') }}"></script>
        <!-- GSAP AND LOCOMOTIV JS-->
        <script src="{{ asset('webfront/js/gsap.min.js') }}"></script>
        <script src="{{ asset('webfront/js/ScrollTrigger.min.js') }}"></script>
        <script src="{{ asset('webfront/js/lenis.js') }}"></script>
        <!-- scrolltopcontrol js -->
        <script src="{{ asset('webfront/js/scrolltopcontrol.js') }}"></script>
        <!-- jquery inview js -->
        <script src="{{ asset('webfront/js/jquery.inview.min.js') }}"></script>
        <!-- WOW - Reveal Animations When You Scroll -->
        <script src="{{ asset('webfront/js/wow.min.js') }}"></script>
        <!-- scripts js -->
        <script src="{{ asset('webfront/js/scripts.js') }}"></script>

        <!-- سكربت تفعيل حركة سلايدر فنيين الأباوت بالنقاط السفلية -->
        <script>
            $(document).ready(function() {
                var teamSlider = $("#team-slider");

                // تدمير النسخ القديمة المعلقة بالكاش لمنع تداخل الأكواد
                if (teamSlider.hasClass('owl-loaded')) {
                    teamSlider.owlCarousel('destroy');
                }

                teamSlider.owlCarousel({
                    items: 3,
                    loop: true,
                    margin: 20,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    smartSpeed: 800,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1170: {
                            items: 3
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const items = document.querySelectorAll('.home-stagger-item');

                if (!('IntersectionObserver' in window)) {
                    items.forEach(item => item.classList.add('is-visible'));
                    return;
                }

                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;

                        const item = entry.target;
                        const siblings = [...item.parentElement.children]
                            .filter(element => element.classList.contains('home-stagger-item'));
                        const index = siblings.indexOf(item);

                        // 80ms بين كروت المجموعة، ويبدأ الترتيب من جديد لكل مجموعة
                        item.style.setProperty('--stagger-delay', `${Math.max(index, 0) * 80}ms`);
                        item.classList.add('is-visible');
                        observer.unobserve(item);
                    });
                }, {
                    threshold: 0.1
                });

                items.forEach(item => observer.observe(item));
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // تشغيل الحركة فور انتهاء تحميل الصفحة لضمان أقصى سرعة وتجربة مستخدم مذهلة
                window.addEventListener("load", function() {
                    const fridgeLoader = document.getElementById("fridge-loader");
                    if (fridgeLoader) {
                        setTimeout(() => {
                            fridgeLoader.classList.add("loaded");
                        }, 400); // 500 ميللي ثانية كافية جداً لإبراز الأنيميشن والانتقال للموقع فوراً
                    }
                });
            });
        </script>
</body>

</html>
