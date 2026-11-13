@extends('perblad.layout')
@section('content')
@section('title', 'Contact Us | COOLFIX Company')
@verbatim
    <style>
        /* =====================================================================
                               COOLFIX – Contact page (all styles scoped under .cfx)
                               ===================================================================== */
        .cfx {
            --g900: #012722;
            --g800: #013E37;
            --g600: #0d6b5e;
            --g100: #e3f1ee;
            --g50: #f3f9f8;
            --amber: #FEC961;
            --amber-d: #f5b335;
            --ink: #0b2a26;
            --muted: #5d7773;
            --line: #dbe8e5;
            --card: #ffffff;
            --field: #f3f8f7;
            --shadow: 0 24px 60px -20px rgb(1 62 55 / .28);
            font-family: 'Lexend', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(900px 420px at 90% -5%, rgb(254 201 97 / .22), transparent 60%),
                radial-gradient(800px 420px at -5% 15%, rgb(13 107 94 / .14), transparent 60%),
                linear-gradient(180deg, #f6fbfa, #ffffff 60%);
            padding: 90px 0 0;
            overflow: hidden;
        }

        .cfx *,
        .cfx *::before,
        .cfx *::after {
            box-sizing: border-box;
        }

        .cfx-wrap {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* generic text inherits (beats the site's dark-mode link/text rules, loses to explicit classes below) */
        .cfx.cfx :where(h1, h2, h3, h4, h5, p, span, li, small, a) {
            color: inherit;
        }

        .cfx svg {
            display: block;
        }

        .cfx a {
            text-decoration: none;
        }

        /* reveal on scroll */
        .cfx.cfx-ready .cfx-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s cubic-bezier(.2, .7, .2, 1);
        }

        .cfx.cfx-ready .cfx-reveal.in {
            opacity: 1;
            transform: none;
        }

        /* ---------- heading ---------- */
        .cfx-head {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 54px;
        }

        .cfx .cfx-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--g100);
            color: var(--g800);
            font-weight: 600;
            font-size: .78rem;
            letter-spacing: .14em;
            text-transform: uppercase;
            padding: 8px 18px;
            border-radius: 50px;
            margin-bottom: 18px;
        }

        .cfx .cfx-eyebrow::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--amber-d);
            box-shadow: 0 0 0 4px rgb(254 201 97 / .4);
        }

        .cfx .cfx-h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.15;
            font-weight: 700;
            color: var(--g800);
            margin: 0 0 16px;
        }

        .cfx .cfx-h2 em {
            font-style: normal;
            background: linear-gradient(transparent 62%, rgb(254 201 97 / .7) 62%);
            padding: 0 4px;
        }

        .cfx .cfx-sub {
            color: var(--muted);
            font-size: 1.08rem;
            line-height: 1.8;
            margin: 0;
        }

        /* ---------- contact cards ---------- */
        .cfx-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-bottom: 34px;
        }

        .cfx-card {
            position: relative;
            display: flex;
            align-items: center;
            gap: 18px;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 26px 24px;
            transition: transform .35s cubic-bezier(.2, .7, .2, 1), box-shadow .35s, border-color .35s;
            overflow: hidden;
        }

        .cfx-card::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 4px;
            background: linear-gradient(90deg, var(--amber), var(--amber-d));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .45s ease;
        }

        .cfx-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow);
            border-color: transparent;
        }

        .cfx-card:hover::after {
            transform: scaleX(1);
        }

        .cfx-ico {
            flex: none;
            width: 60px;
            height: 60px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--g600), var(--g800));
            color: var(--amber);
            box-shadow: 0 12px 24px -8px rgb(1 62 55 / .55);
            transition: transform .35s;
        }

        .cfx-card:hover .cfx-ico {
            transform: rotate(-8deg) scale(1.08);
        }

        .cfx-ico svg {
            width: 28px;
            height: 59px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .cfx .cfx-card-label {
            display: block;
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 4px;
        }

        .cfx .cfx-card-value {
            display: block;
            font-size: 1.08rem;
            font-weight: 600;
            color: var(--g800);
            line-height: 1.4;
            word-break: break-word;
        }

        /* ---------- main grid ---------- */
        .cfx-main {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 30px;
            align-items: start;
        }

        .cfx-form-card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 30px;
            padding: 44px;
            box-shadow: var(--shadow);
            position: relative;
        }

        .cfx-form-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 44px;
            right: 44px;
            height: 5px;
            border-radius: 0 0 8px 8px;
            background: linear-gradient(90deg, var(--g800), var(--g600), var(--amber));
        }

        .cfx .cfx-form-title {
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--g800);
            margin: 6px 0 8px;
        }

        .cfx .cfx-form-sub {
            color: var(--muted);
            margin: 0 0 26px;
            line-height: 1.7;
        }

        /* alerts */
        .cfx .cfx-alert {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            border-radius: 16px;
            padding: 16px 18px;
            margin-bottom: 22px;
            font-size: .95rem;
            line-height: 1.6;
        }

        .cfx .cfx-alert.ok {
            background: #e7f6ef;
            color: #0b5a3b;
            border: 1px solid #b6e2cd;
        }

        .cfx .cfx-alert.err {
            background: #fdecec;
            color: #991b1b;
            border: 1px solid #f5c2c2;
        }

        .cfx .cfx-alert ul {
            margin: 6px 0 0;
            padding-inline-start: 18px;
        }

        /* form controls (works with <x-input> / <x-textarea>) */
        .cfx-form .row {
            --bs-gutter-x: 18px;
            margin-left: -9px;
            margin-right: -9px;
        }

        .cfx-form .row>* {
            padding-left: 9px;
            padding-right: 9px;
            margin-bottom: 18px;
        }

        .cfx-form .form-group {
            margin: 0;
        }

        .cfx-form input:not([type="hidden"]):not([type="checkbox"]):not([type="radio"]),
        .cfx-form textarea,
        .cfx-form select {
            width: 100%;
            background: var(--field);
            color: var(--ink);
            border: 1.5px solid transparent;
            border-radius: 16px;
            padding: 16px 20px;
            font: 400 .98rem 'Lexend', sans-serif;
            height: auto;
            box-shadow: none;
            outline: 0;
            transition: border-color .25s, background .25s, box-shadow .25s;
        }

        .cfx-form textarea {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        .cfx-form input::placeholder,
        .cfx-form textarea::placeholder {
            color: #8aa09c;
        }

        .cfx-form input:hover,
        .cfx-form textarea:hover {
            border-color: var(--line);
        }

        .cfx-form input:focus,
        .cfx-form textarea:focus,
        .cfx-form select:focus {
            background: #fff;
            border-color: var(--g800);
            box-shadow: 0 0 0 5px rgb(1 62 55 / .12);
        }

        .cfx-form .cfx-invalid {
            border-color: #dc2626 !important;
            background: #fff6f6 !important;
            box-shadow: 0 0 0 5px rgb(220 38 38 / .1) !important;
        }

        .cfx-form .cfx-field-error {
            display: block;
            color: #dc2626;
            font-size: .8rem;
            margin: 6px 4px 0;
        }

        .cfx .cfx-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            border: 0;
            cursor: pointer;
            padding: 18px 30px;
            border-radius: 18px;
            font: 600 1.05rem 'Lexend', sans-serif;
            color: var(--g800) !important;
            background: linear-gradient(135deg, var(--amber), var(--amber-d));
            box-shadow: 0 16px 30px -10px rgb(245 179 53 / .75);
            transition: transform .25s, box-shadow .25s, filter .25s;
        }

        .cfx .cfx-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 22px 36px -10px rgb(245 179 53 / .85);
            filter: saturate(1.1);
        }

        .cfx .cfx-submit svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: transform .25s;
        }

        .cfx .cfx-submit:hover svg {
            transform: translateX(5px);
        }

        .cfx .cfx-submit[disabled] {
            opacity: .7;
            cursor: progress;
            pointer-events: none;
        }

        .cfx .cfx-note {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            font-size: .82rem;
            color: var(--muted);
            margin: 16px 0 0;
        }

        .cfx .cfx-note svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* ---------- side column ---------- */
        .cfx-side {
            display: grid;
            gap: 26px;
        }

        .cfx-info {
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            padding: 36px;
            color: #fff;
            background: linear-gradient(150deg, var(--g800) 0%, var(--g900) 100%);
            box-shadow: var(--shadow);
        }

        .cfx-info::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            right: -90px;
            top: -110px;
            border-radius: 50%;
            background: radial-gradient(circle, rgb(254 201 97 / .35), transparent 70%);
        }

        .cfx-info::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            left: -80px;
            bottom: -100px;
            border-radius: 50%;
            border: 36px solid rgb(255 255 255 / .05);
        }

        .cfx-info>* {
            position: relative;
            z-index: 1;
        }

        .cfx .cfx-status {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgb(255 255 255 / .1);
            border: 1px solid rgb(255 255 255 / .18);
            color: #fff;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: .85rem;
            font-weight: 500;
            backdrop-filter: blur(6px);
        }

        .cfx .cfx-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #9ca3af;
        }

        .cfx .cfx-status.open .cfx-dot {
            background: #34d399;
            box-shadow: 0 0 0 0 rgb(52 211 153 / .7);
            animation: cfxPulse 1.8s infinite;
        }

        .cfx .cfx-status.emergency .cfx-dot {
            background: var(--amber);
        }

        @keyframes cfxPulse {
            70% {
                box-shadow: 0 0 0 10px rgb(52 211 153 / 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgb(52 211 153 / 0);
            }
        }

        .cfx .cfx-info-title {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 700;
            margin: 20px 0 6px;
        }

        .cfx .cfx-info-text {
            color: rgb(255 255 255 / .75);
            margin: 0 0 22px;
            line-height: 1.7;
            font-size: .95rem;
        }

        .cfx .cfx-hours {
            list-style: none;
            margin: 0 0 26px;
            padding: 0;
        }

        .cfx .cfx-hours li {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px dashed rgb(255 255 255 / .2);
            color: #fff;
            font-size: .95rem;
        }

        .cfx .cfx-hours li:last-child {
            border-bottom: 0;
        }

        .cfx .cfx-hours li b {
            color: var(--amber);
            font-weight: 600;
        }

        .cfx-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .cfx .cfx-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 14px 16px;
            border-radius: 16px;
            font-weight: 600;
            font-size: .93rem;
            transition: transform .25s, background .25s, box-shadow .25s;
        }

        .cfx .cfx-btn svg {
            width: 19px;
            height: 19px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .cfx .cfx-btn:hover {
            transform: translateY(-3px);
        }

        .cfx .cfx-btn.solid {
            background: var(--amber);
            color: var(--g800) !important;
            box-shadow: 0 12px 24px -10px rgb(254 201 97 / .8);
        }

        .cfx .cfx-btn.ghost {
            background: rgb(255 255 255 / .1);
            color: #fff !important;
            border: 1px solid rgb(255 255 255 / .25);
        }

        .cfx .cfx-btn.ghost:hover {
            background: rgb(255 255 255 / .2);
        }

        /* steps */
        .cfx-steps {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 30px;
            padding: 32px 34px;
        }

        .cfx .cfx-steps-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--g800);
            margin: 0 0 22px;
        }

        .cfx-step {
            display: flex;
            gap: 16px;
            position: relative;
            padding-bottom: 24px;
        }

        .cfx-step:last-child {
            padding-bottom: 0;
        }

        .cfx-step:not(:last-child)::before {
            content: "";
            position: absolute;
            left: 21px;
            top: 46px;
            bottom: 4px;
            width: 2px;
            background: repeating-linear-gradient(var(--line) 0 5px, transparent 5px 10px);
        }

        .cfx .cfx-num {
            flex: none;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: 700;
            color: var(--g800);
            background: var(--amber);
            box-shadow: 0 8px 18px -6px rgb(245 179 53 / .8);
        }

        .cfx .cfx-step h4 {
            margin: 2px 0 4px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--g800);
        }

        .cfx .cfx-step p {
            margin: 0;
            color: var(--muted);
            font-size: .9rem;
            line-height: 1.6;
        }

        /* map */
        .cfx-map {
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            background: var(--card);
        }

        .cfx-map iframe {
            display: block;
            width: 100%;
            height: 320px;
            border: 0;
        }

        .cfx-map-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            padding: 18px 24px;
        }

        .cfx .cfx-map-addr {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: .92rem;
            font-weight: 500;
            color: var(--ink);
        }

        .cfx .cfx-map-addr svg {
            width: 20px;
            height: 20px;
            stroke: var(--g600);
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex: none;
        }

        .cfx .cfx-map-link {
            font-weight: 600;
            font-size: .9rem;
            color: var(--g800);
            border-bottom: 2px solid var(--amber);
            padding-bottom: 2px;
        }

        /* ---------- CTA banner ---------- */
        .cfx-cta {
            margin: 90px 0 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, var(--g900), var(--g800) 55%, var(--g600));
        }

        .cfx-cta::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            right: -140px;
            top: -260px;
            border-radius: 50%;
            background: radial-gradient(circle, rgb(254 201 97 / .4), transparent 68%);
        }

        .cfx-cta-inner {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            padding: 56px 0;
        }

        .cfx .cfx-cta h3 {
            color: #fff;
            font-size: clamp(1.6rem, 3vw, 2.3rem);
            font-weight: 700;
            margin: 0 0 8px;
        }

        .cfx .cfx-cta p {
            color: rgb(255 255 255 / .78);
            margin: 0;
            font-size: 1.05rem;
        }

        .cfx .cfx-cta .cfx-btn {
            padding: 18px 34px;
            font-size: 1.05rem;
            border-radius: 50px;
        }

        /* ---------- responsive ---------- */
        @media (max-width: 991px) {
            .cfx {
                padding-top: 60px;
            }

            .cfx-cards {
                grid-template-columns: 1fr;
            }

            .cfx-main {
                grid-template-columns: 1fr;
            }

            .cfx-form-card {
                padding: 34px 26px;
            }

            .cfx-form-card::before {
                left: 26px;
                right: 26px;
            }
        }

        @media (max-width: 575px) {
            .cfx-actions {
                grid-template-columns: 1fr;
            }

            .cfx-info,
            .cfx-steps {
                padding: 28px 22px;
            }

            .cfx-cta-inner {
                padding: 42px 0;
                text-align: center;
                justify-content: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .cfx *,
            .cfx *::before,
            .cfx *::after {
                animation: none !important;
                transition: none !important;
            }

            .cfx.cfx-ready .cfx-reveal {
                opacity: 1;
                transform: none;
            }
        }

        /* ---------- dark mode (follows the header theme switch) ---------- */
        body.dark-mode .cfx {
            --ink: #e6f2f0;
            --muted: #9db8b3;
            --line: #1f4a43;
            --card: #0f211e;
            --field: #142b27;
            --g100: #14352f;
            background: radial-gradient(900px 420px at 90% -5%, rgb(254 201 97 / .1), transparent 60%), linear-gradient(180deg, #0b1614, #0b1614);
        }

        body.dark-mode .cfx .cfx-h2,
        body.dark-mode .cfx .cfx-form-title,
        body.dark-mode .cfx .cfx-steps-title,
        body.dark-mode .cfx .cfx-card-value,
        body.dark-mode .cfx .cfx-step h4,
        body.dark-mode .cfx .cfx-map-link {
            color: #7fd6c6;
        }

        body.dark-mode .cfx .cfx-eyebrow {
            color: #7fd6c6;
        }

        body.dark-mode .cfx-form input:focus,
        body.dark-mode .cfx-form textarea:focus {
            background: #0f211e;
            border-color: #7fd6c6;
            box-shadow: 0 0 0 5px rgb(127 214 198 / .15);
        }

        body.dark-mode .cfx .cfx-alert.ok {
            background: #0f2b21;
            color: #8be0b8;
            border-color: #1d5a40;
        }

        body.dark-mode .cfx .cfx-alert.err {
            background: #2b1214;
            color: #f3a1a1;
            border-color: #6b2326;
        }

        body.dark-mode .cfx .cfx-map-addr svg {
            stroke: #7fd6c6;
        }

        /* حل مشكلة التصاق الـ Components */
        .cfx-form .row>* {
            padding-left: 9px !important;
            padding-right: 9px !important;
            margin-bottom: 20px !important;
            /* يعطي مسافة عمودية بين الحقول تحت بعضها */
        }

        /* تصغير حجم خط النصوص التوضيحية لجميع الحقول */
        .cfx-form input::placeholder,
        .cfx-form textarea::placeholder {
            font-size: 15px !important;
            /* يمكنك تغيير الرقم 15 إلى الحجم المناسب لك */
        }
    </style>
@endverbatim
<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                <h1>{{ __('Get In Touch') }}</h1>
                <ul>
                    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li> {{ __('/ Contact') }}</li>
                </ul>
            </div><!-- //.HERO-TEXT -->
        </div><!--- END COL -->
    </div><!--- END CONTAINER -->
</section>
<!-- END SECTION TOP -->
</div><!-- END  TOP HEADER CLASS -->

<!-- ===================== CONTACT (redesigned) ===================== -->
<section class="cfx" id="contact">
    <div class="cfx-wrap">

        {{-- Heading --}}
        <div class="cfx-head cfx-reveal">
            <span class="cfx-eyebrow">{{ __('Contact COOLFIX') }}</span>
            <h2 class="cfx-h2">{!! __("Fridge in trouble? <em>We'll fix it fast.</em>") !!}</h2>
            <p class="cfx-sub">
                {{ __("Tell us what's wrong and our technicians will get back to you. Prefer to talk right now? Call or message us, we're one tap away.") }}
            </p>
        </div>

        {{-- Quick contact cards --}}
        <div class="cfx-cards home-stagger-item">
            <a class="cfx-card cfx-reveal" href="tel:+970598924040"
                style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                <span class="cfx-ico">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" />
                    </svg>
                </span>
                <span>
                    <span class="cfx-card-label">{{ __('Call / WhatsApp') }}</span>
                    <!-- إضافة وسم bdo لمنع المتصفح من قلب ترتيب الأرقام في الاتجاهين -->
                    <span class="cfx-card-value"><bdo dir="ltr">059 892 4040</bdo></span>
                </span>
            </a>
            <a class="cfx-card cfx-reveal" href="mailto:mohammedkareem@gmail.com">
                <span class="cfx-ico">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="4" width="20" height="16" rx="3" />
                        <path d="m2 7 10 6 10-6" />
                    </svg>
                </span>
                <span>
                    <span class="cfx-card-label">{{ __('Send Email') }}</span>
                    <span class="cfx-card-value">mohammedkareem@gmail.com</span>
                </span>
            </a>
            <a class="cfx-card cfx-reveal" target="_blank" rel="noopener"
                href="https://www.google.com/maps/search/?api=1&query=Omar+Al-Mukhtar+St+Gaza">
                <span class="cfx-ico">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </span>
                <span>
                    <span class="cfx-card-label">{{ __('Our Workshop') }}</span>
                    <span class="cfx-card-value">{{ __('End of Omar Al-Mukhtar St., Gaza') }}</span>
                </span>
            </a>
        </div>

        {{-- Form + side --}}
        <div class="cfx-main">

            {{-- FORM --}}
            <div class="cfx-form-card cfx-reveal home-stagger-item">
                <h3 class="cfx-form-title">{{ __('Request a repair') }}</h3>
                <p class="cfx-form-sub">
                    {{ __('Fill in the details below, the more we know about the problem, the faster we can help.') }}
                </p>

                @if (session('success'))
                    <div class="cfx-alert ok" role="status">
                        <span>✔</span><span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="cfx-alert err" role="alert">
                        <span>⚠️</span>
                        <div>
                            {{ __('Please fix the following:') }}
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form class="cfx-form" id="contactForm" name="enq" method="POST"
                    action="{{ route('contact.submit') }}" novalidate>
                    @csrf
                    <div class="row">
                        <x-input type="text" name="name" :placeholder="__('Enter your name')" />
                        <x-input type="tel" name="phone" :placeholder="__('WhatsApp / Phone Number')" />
                        <x-input type="text" name="brand" :placeholder="__('Fridge Brand (e.g., LG, Samsung)')" />
                        <x-input type="text" name="area" :placeholder="__('Area / Neighborhood in Gaza')" />
                        <x-textarea name="describe" :placeholder="__(
                            'Describe the problem (noise, leaking, not cooling, etc.) and your address in Gaza',
                        )" />
                        <div class="col-md-12">
                            <button type="submit" class="cfx-submit" id="contactSubmit">
                                <span>{{ __('Send Message') }}</span>
                                <svg viewBox="0 0 24 24">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </button>
                            <p class="cfx-note">
                                <svg viewBox="0 0 24 24">
                                    <rect x="4" y="11" width="16" height="10" rx="2" />
                                    <path d="M8 11V7a4 4 0 0 1 8 0v4" />
                                </svg>
                                <span>{{ __('Your details are only used to contact you about your repair.') }}</span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            {{-- SIDE --}}
            <aside class="cfx-side">

                <div class="cfx-info cfx-reveal home-stagger-item">
                    <span class="cfx-status" id="cfxStatus"><span class="cfx-dot"></span><span
                            id="cfxStatusText">Checking availability…</span></span>
                    <h3 class="cfx-info-title">{{ __('Working hours') }}</h3>
                    <p class="cfx-info-text">
                        {{ __('Our technicians are available all week. Friday is reserved for emergency calls.') }}</p>
                    <ul class="cfx-hours">
                        <li><span>{{ __('Saturday – Thursday') }}</span><b>{{ __('8:00 AM – 8:00 PM') }}</b></li>
                        <li><span>{{ __('Friday') }}</span><b>{{ __('Emergency only') }}</b></li>
                    </ul>
                    <div class="cfx-actions">
                        <a class="cfx-btn solid" href="tel:+970598924040">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" />
                            </svg>
                            <span>{{ __('Call now') }}</span>
                        </a>
                        <a class="cfx-btn ghost" href="https://wa.me/972598924040" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20.5l1.6-5.4A8.4 8.4 0 1 1 21 11.5z" />
                            </svg>
                            <span>{{ __('WhatsApp') }}</span>
                        </a>
                    </div>
                </div>

                <div class="cfx-steps cfx-reveal home-stagger-item">
                    <h4 class="cfx-steps-title">{{ __('How it works') }}</h4>
                    <div class="cfx-step">
                        <span class="cfx-num">1</span>
                        <div>
                            <h4>{{ __('Tell us the problem') }}</h4>
                            <p>{{ __("Send the form or message us with your fridge brand and what's wrong.") }}</p>
                        </div>
                    </div>
                    <div class="cfx-step">
                        <span class="cfx-num">2</span>
                        <div>
                            <h4>{{ __('We get in touch') }}</h4>
                            <p>{{ __('We contact you to confirm the details and arrange a visit.') }}</p>
                        </div>
                    </div>
                    <div class="cfx-step">
                        <span class="cfx-num">3</span>
                        <div>
                            <h4>{{ __('Fixed & cooling again') }}</h4>
                            <p>{{ __('Our technician diagnoses and repairs it, honestly and professionally.') }}</p>
                        </div>
                    </div>
                </div>

        </div>

        </aside>
    </div>
    </div>

    {{-- CTA banner --}}
    <div class="cfx-cta home-stagger-item">
        <div class="cfx-wrap">
            <div class="cfx-cta-inner">
                <div>
                    <h3>{{ __("Don't let your food spoil.") }}</h3>
                    <p>{{ __('One call and a COOLFIX technician is on the way.') }}</p>
                </div>
                <a class="cfx-btn solid" href="tel:+970598924040">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" />
                    </svg>
                    <span>059 892 4040</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- ===================== END CONTACT ===================== -->

@endsection
