<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLFIX - Refrigerator & Cooling Repair in Gaza</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('webfront/images/all-img/image_48ee44cebd.png') }}">
    <script>
        (function() {
            try {
                if (localStorage.getItem('cf_theme') === 'dark')
                    document.documentElement.setAttribute('data-theme', 'dark');
                if (localStorage.getItem('cf_lang') === 'en') {
                    document.documentElement.lang = 'en';
                    document.documentElement.dir = 'ltr';
                }
            } catch (e) {}
        })();
    </script>
    <style>
        :root {
            --primary: #013E37;
            --violet: #0d6b5e;
            --tint: #d9efe9;
            --bg: #f1f5f9;
            --card: #fff;
            --text: #1e293b;
            --muted: #64748b;
            --line: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            margin: 0;
            padding: 36px 20px 60px;
            background: var(--bg);
            color: var(--text);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
        }

        /* header */
        .header-section {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        h1 {
            font-size: 24px;
            font-weight: 800;
            margin: 0;
            color: #0f172a;
        }

        .header-tools {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .badge {
            background: var(--tint);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
        }

        .rabit_home {
            background: #fff;
            color: #1A444E;
            border: 1px solid var(--line);
            font-weight: 700;
            font-size: 14px;
            padding: 5px 16px;
            border-radius: 15px;
            text-decoration: none;
            transition: .25s;
        }

        .rabit_home:hover {
            background: #013e37;
            color: #fff;
            box-shadow: 1px 1px 7px #013e37;
        }

        /* stats */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .stat {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 2px 8px rgb(15 23 42 / .04);
        }

        .stat i {
            font-style: normal;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 1.3rem;
        }

        .stat b {
            display: block;
            font-size: 1.5rem;
            line-height: 1.1;
        }

        .stat span {
            color: var(--muted);
            font-size: .82rem;
            font-weight: 600;
        }

        /* search + filters */
        .search-wrap {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            background: #fff;
            border: 2px solid var(--line);
            border-radius: 50px;
            padding: 6px 54px 6px 22px;
            transition: .3s;
            box-shadow: 0 4px 20px rgb(0 0 0 / .03);
        }

        .search-wrap:focus-within {
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgb(1 62 55 / .22);
            transform: translateY(-1px);
        }

        #post-search-input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            font: 500 1.02rem 'Cairo', sans-serif;
            color: #0f2a27;
            direction: ltr;
            text-align: left;
            padding: 10px 0;
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--violet), var(--primary));
            box-shadow: 0 4px 12px rgb(1 62 55 / .35);
            cursor: pointer;
        }

        .search-btn::before {
            content: "";
            position: absolute;
            width: 12px;
            height: 12px;
            border: 2px solid #fff;
            border-radius: 50%;
            top: 11px;
            left: 11px;
        }

        .search-btn::after {
            content: "";
            position: absolute;
            width: 2px;
            height: 6px;
            background: #fff;
            top: 23px;
            left: 23px;
            transform: rotate(-45deg);
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 14px 0 18px;
            align-items: center;
        }

        .chip {
            border: 1px solid var(--line);
            background: #fff;
            color: var(--muted);
            border-radius: 999px;
            padding: 6px 16px;
            font: 700 .85rem 'Cairo', sans-serif;
            cursor: pointer;
            transition: .2s;
        }

        .chip:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .chip.on {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 4px 12px rgb(1 62 55 / .3);
        }

        .result-count {
            margin-right: auto;
            color: var(--muted);
            font-size: .85rem;
            font-weight: 600;
        }

        /* table */
        .table-responsive {
            background: var(--card);
            border-radius: 14px;
            border: 1px solid var(--line);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / .05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: right;
            min-width: 900px;
        }

        th {
            background: #f8fafc;
            color: var(--muted);
            font-weight: 700;
            font-size: 13px;
            padding: 15px 20px;
            border-bottom: 1px solid var(--line);
            white-space: nowrap;
        }

        td {
            padding: 14px 20px;
            font-size: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        tr:hover td {
            background: #f8fafc;
        }

        .post-row.account-blocked-row td {
            background: #fff5f5;
        }

        .post-row.account-blocked-row .avatar {
            filter: grayscale(.7);
        }

        .post-row.hide-row-premium {
            display: none !important;
        }

        .id-cell {
            font-weight: 700;
            color: var(--muted);
        }

        .content-cell {
            color: var(--muted);
            max-width: 280px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            color: #0f172a;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            background: linear-gradient(135deg, var(--violet), var(--primary));
            flex: none;
        }

        .tag-blocked {
            background: #fee2e2;
            color: #b91c1c;
            font-size: .7rem;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 20px;
            margin-right: 6px;
        }

        .type-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .type-pill {
            color: #fff;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: .78rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .royal-badge-glow-top {
            background: linear-gradient(135deg, #fbbf24, #d97706);
            color: #fff;
            font-size: .65rem;
            font-weight: 900;
            padding: 3px 10px;
            border-radius: 20px;
            white-space: nowrap;
            letter-spacing: .5px;
            animation: royalPulse 1.5s infinite alternate;
        }

        @keyframes royalPulse {
            from {
                box-shadow: 0 3px 8px rgb(217 119 6 / .25);
            }

            to {
                box-shadow: 0 4px 15px rgb(251 191 36 / .6);
            }
        }

        /* action buttons: compact, icon first, label on hover (tooltip) */
        .actions-col {
            width: 250px;
        }

        .action-group {
            display: flex;
            gap: 8px;
        }

        .act {
            position: relative;
            width: 40px;
            height: 40px;
            display: inline-grid;
            place-items: center;
            border-radius: 12px;
            border: 2px solid;
            text-decoration: none;
            font-size: 1.1rem;
            cursor: pointer;
            transition: transform .2s, box-shadow .2s, background .2s;
        }

        .act:hover {
            transform: translateY(-3px);
        }

        .act:active {
            transform: scale(.94);
        }

        .act::before {
            content: attr(data-tip);
            position: absolute;
            bottom: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%) translateY(4px);
            background: #0f172a;
            color: #fff;
            font: 700 .72rem 'Cairo', sans-serif;
            padding: 4px 10px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: .18s;
            z-index: 5;
        }

        .act:hover::before,
        .act:focus-visible::before {
            opacity: 1;
            transform: translateX(-50%);
        }

        .act:focus-visible {
            outline: 3px solid rgb(1 62 55 / .45);
            outline-offset: 2px;
        }

        .act-role {
            background: #eef6f4;
            border-color: #b7d8d3;
        }

        .act-role:hover {
            background: #d9efe9;
            box-shadow: 0 10px 22px rgb(1 62 55 / .25);
        }

        .act-block {
            background: #fff7ed;
            border-color: #fed7aa;
        }

        .act-block:hover {
            background: #ffedd5;
            box-shadow: 0 10px 22px rgb(234 88 12 / .25);
        }

        .act-unblock {
            background: #fef3c7;
            border-color: #fde68a;
        }

        .act-del {
            background: #fef2f2;
            border-color: #fca5a5;
        }

        .act-del:hover {
            background: #fee2e2;
            box-shadow: 0 10px 22px rgb(185 28 28 / .25);
        }

        .act-top {
            background: #fffbeb;
            border-color: #fde68a;
        }

        .act-top:hover {
            background: #fef3c7;
            box-shadow: 0 10px 22px rgb(217 119 6 / .25);
        }

        .act-spy {
            background: #ecfdf5;
            border-color: #a7f3d0;
        }

        .act-spy:hover {
            background: #d1fae5;
            box-shadow: 0 10px 22px rgb(4 120 87 / .25);
        }

        .ring {
            position: absolute;
            inset: 0;
            border-radius: 12px;
            border: 3px solid currentColor;
            opacity: 0;
            pointer-events: none;
        }

        .act:active .ring {
            animation: boom .55s cubic-bezier(.1, .8, .3, 1) forwards;
        }

        @keyframes boom {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(2.1);
            }
        }

        .act.busy {
            pointer-events: none;
            opacity: .5;
        }


        /* state-driven buttons */
        .ico {
            display: inline-block;
            line-height: 1;
            transition: transform .25s, filter .25s, opacity .25s;
        }

        .act:hover .ico {
            transform: scale(1.15) rotate(8deg);
        }

        .act.is-admin,
        .act.is-admin:hover {
            background: #cde5e1;
            border-color: #013E37;
            box-shadow: 0 0 0 3px rgb(1 62 55 / .14);
        }

        .act.is-blocked,
        .act.is-blocked:hover {
            background: #fecaca;
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgb(185 28 28 / .16), 0 6px 16px rgb(185 28 28 / .3);
        }

        .act.is-top,
        .act.is-top:hover {
            background: #fde68a;
            border-color: #d97706;
            box-shadow: 0 0 16px rgb(251 191 36 / .65);
        }

        .act-top:not(.is-top) .ico {
            filter: grayscale(1);
            opacity: .5;
        }

        .act-top:not(.is-top):hover .ico {
            filter: none;
            opacity: 1;
        }

        .act.just-changed {
            animation: flashBtn 1.3s ease-out;
        }

        .act.just-changed .ico {
            animation: icoPop .85s cubic-bezier(.2, .9, .3, 1.4);
        }

        @keyframes icoPop {
            0% {
                transform: scale(.35) rotate(-45deg);
            }

            55% {
                transform: scale(1.55) rotate(12deg);
            }

            100% {
                transform: none;
            }
        }

        @keyframes flashBtn {
            0% {
                box-shadow: 0 0 0 0 rgb(1 62 55 / .75);
            }

            100% {
                box-shadow: 0 0 0 20px transparent;
            }
        }

        .post-row.just-row td {
            animation: rowFlash 1.8s ease-out;
        }

        @keyframes rowFlash {
            0% {
                background: var(--tint);
            }

            100% {
                background: transparent;
            }
        }

        .empty-row td {
            text-align: center;
            padding: 40px;
            color: var(--muted);
            font-weight: 700;
            display: none;
        }

        .empty-row.show td {
            display: table-cell;
        }

        /* toast */
        #custom-toast-notification {
            position: fixed;
            top: 30px;
            right: -450px;
            background: rgb(255 255 255 / .96);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 16px 22px;
            box-shadow: 0 20px 40px rgb(1 62 55 / .15);
            display: flex;
            align-items: center;
            gap: 16px;
            z-index: 999999;
            transition: all .5s cubic-bezier(.68, -.55, .265, 1.55);
            min-width: 340px;
            overflow: hidden;
            border: 1px solid var(--line);
        }

        #custom-toast-notification::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(#0d6b5e, #013E37);
        }

        #custom-toast-notification.show-toast-ultra {
            right: 30px;
        }

        .toast-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 6px 20px rgb(16 185 129 / .4);
            flex: none;
        }

        .show-toast-ultra .toast-icon {
            animation: spinIcon .6s cubic-bezier(.175, .885, .32, 1.275) .2s both;
        }

        @keyframes spinIcon {
            from {
                transform: scale(0) rotate(0);
            }

            to {
                transform: scale(1) rotate(360deg);
            }
        }

        .toast-title {
            font-weight: 800;
            font-size: 1rem;
            background: linear-gradient(135deg, #013E37, #0d6b5e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .toast-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            width: 100%;
            background: linear-gradient(to right, #10b981, #013E37);
            transform-origin: left;
        }

        .show-toast-ultra .toast-bar {
            animation: shrink 3.5s linear forwards;
        }

        @keyframes shrink {
            to {
                transform: scaleX(0);
            }
        }

        @media (max-width: 760px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            h1 {
                font-size: 19px;
            }

            body {
                padding: 22px 12px 50px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation: none !important;
                transition: none !important;
            }
        }

        /* ===== أزرار الثيم واللغة ===== */
        .navbar-buttons-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .theme-toggle-switch {
            direction: ltr;
            position: relative;
            width: 58px;
            height: 30px;
            background: #cfe3df;
            border: 1px solid var(--line);
            border-radius: 999px;
            cursor: pointer;
            transition: background .3s, border-color .3s;
        }

        .theme-toggle-switch:focus-visible {
            outline: 3px solid rgb(1 62 55 / .45);
            outline-offset: 2px;
        }

        .theme-toggle-knob {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            background: #fff;
            box-shadow: 0 2px 6px rgb(0 0 0 / .25);
            transition: transform .35s cubic-bezier(.68, -.4, .27, 1.4);
        }

        [data-theme="dark"] .theme-toggle-switch {
            background: var(--primary);
            border-color: #0d6b5e;
        }

        [data-theme="dark"] .theme-toggle-knob {
            transform: translateX(28px);
            background: #0f1b18;
        }

        .coolfix-lang-btn {
            font: 700 14px 'Cairo', sans-serif;
            background: #fff;
            color: #1A444E;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 5px 16px;
            cursor: pointer;
            transition: .25s;
        }

        .coolfix-lang-btn:hover {
            background: #013e37;
            color: #fff;
            box-shadow: 1px 1px 7px #013e37;
        }

        /* ===== الوضع الليلي ===== */
        :root[data-theme="dark"] {
            --bg: #0b1412;
            --card: #13211e;
            --text: #e6f0ee;
            --muted: #93a8a4;
            --line: #24352f;
            --tint: #143a34;
            color-scheme: dark;
        }

        [data-theme="dark"] h1 {
            color: #f1f5f9;
        }

        [data-theme="dark"] .badge {
            color: #6ee7d3;
        }

        [data-theme="dark"] .rabit_home,
        [data-theme="dark"] .coolfix-lang-btn,
        [data-theme="dark"] .chip,
        [data-theme="dark"] .search-wrap {
            background: var(--card);
            color: #d5e6e2;
        }

        [data-theme="dark"] .rabit_home:hover,
        [data-theme="dark"] .coolfix-lang-btn:hover {
            background: #0d6b5e;
            color: #fff;
        }

        [data-theme="dark"] .chip.on {
            background: #0d6b5e;
            border-color: #0d6b5e;
            color: #fff;
        }

        [data-theme="dark"] #post-search-input {
            color: #e6f0ee;
        }

        [data-theme="dark"] th {
            background: #0f1b18;
        }

        [data-theme="dark"] td {
            color: #cbd9d6;
            border-bottom-color: #1b2b27;
        }

        [data-theme="dark"] tr:hover td {
            background: #172623;
        }

        [data-theme="dark"] .user-cell {
            color: #f1f5f9;
        }

        [data-theme="dark"] .post-row.account-blocked-row td {
            background: #2a1717;
        }

        [data-theme="dark"] .act-role {
            background: #12302b;
            border-color: #1f5a50;
        }

        [data-theme="dark"] .act-block {
            background: #2e2214;
            border-color: #6b4220;
        }

        [data-theme="dark"] .act-top {
            background: #2e2a14;
            border-color: #6b5a20;
        }

        [data-theme="dark"] .act-spy {
            background: #10301f;
            border-color: #1f6b45;
        }

        [data-theme="dark"] .act-del {
            background: #331616;
            border-color: #7a2a2a;
        }

        [data-theme="dark"] .stat {
            box-shadow: none;
        }

        [data-theme="dark"] #custom-toast-notification {
            background: rgb(19 33 30 / .96);
        }

        [data-theme="dark"] #toast-message-text {
            color: #cbd9d6 !important;
        }

        /* ===== الاتجاه LTR للإنجليزي ===== */
        [dir="ltr"] body {
            direction: ltr;
        }

        [dir="ltr"] table,
        [dir="ltr"] th {
            text-align: left;
        }

        [dir="ltr"] .result-count {
            margin-right: 0;
            margin-left: auto;
        }

        [dir="ltr"] .tag-blocked {
            margin-right: 0;
            margin-left: 6px;
        }

        [dir="ltr"] td[style*="direction:ltr"] {
            text-align: left !important;
        }
        .stagger-item {
    opacity: 0;
    transform: translateY(12px);
    transition: opacity 350ms ease, transform 350ms ease;
    transition-delay: var(--stagger-delay, 0ms);
}

.stagger-item.is-visible {
    opacity: 1;
    transform: translateY(0);
}

@media (prefers-reduced-motion: reduce) {
    .stagger-item {
        opacity: 1;
        transform: none;
        transition: none;
    }
}
.stagger-item {
    animation: rowEnter 300ms ease both;
    animation-delay: var(--stagger-delay, 0ms);
}

@keyframes rowEnter {
    from {
        opacity: 0;
        transform: translateY(6px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (prefers-reduced-motion: reduce) {
    .stagger-item {
        animation: none;
    }
}

    </style>
</head>

<body>
    <!-- Toast (moved into body; was invalid inside head) -->
    <div id="custom-toast-notification" role="status" aria-live="polite">
        <div class="toast-icon">✔</div>
        <div style="display:flex;flex-direction:column;flex:1">
            <span class="toast-title">تحديث لوحة البيانات ⚡</span>
            <span id="toast-message-text"
                style="color:#334155;font-size:.9rem;font-weight:600">{{ session('success') }}</span>
        </div>
        <div class="toast-bar"></div>
    </div>

    <div class="container">
        <div class="header-section">
            <h1>صندوق بيانات الحسابات والمستخدمين 👤</h1>
                <div class="header-tools">
                    <div class="d-flex align-items-center justify-content-end gap-2 navbar-buttons-wrapper">

                        <!-- زر تبديل النمط (ليلي / نهاري) -->
                        <div class="coolfix-theme-switch m-0">
                            <div class="theme-toggle-switch" id="themeToggleSwitch" role="button" tabindex="0"
                                aria-label="Toggle dark mode">
                                <div class="theme-toggle-knob" id="themeToggleKnob">☀️</div>
                            </div>
                        </div>

                        <!-- زر اللغة -->
                        <button type="button" class="coolfix-lang-btn" id="langSwitcherBtn">English</button>
                    </div>

                    <a class="rabit_home" href="{{ url('/') }}">{{ __("Home") }}</a>
                    <span class="badge">العدد الإجمالي: {{ $users->count() }}</span>
                </div>
        </div>

        <div class="stats">
            <div class="stat"><i style="background:#d9efe9">👥</i>
                <div><b>{{ $users->count() }}</b><span>إجمالي الحسابات</span></div>
            </div>
            <div class="stat"><i style="background:#fef3c7">🛡️</i>
                <div><b>{{ $users->where('type', 'admin')->count() }}</b><span>مدراء</span></div>
            </div>
            <div class="stat"><i style="background:#fee2e2">🚫</i>
                <div><b>{{ $users->where('is_blocked', true)->count() }}</b><span>محظورون</span></div>
            </div>
            <div class="stat"><i style="background:#fffbeb">🌟</i>
                <div><b>{{ $users->where('is_top', true)->count() }}</b><span>مميّزون</span></div>
            </div>
        </div>

        <!-- Search (same ids and starts-with logic as before) -->
        <div class="search-wrap">
            <input type="text" id="post-search-input" autocomplete="off"
                placeholder="Search for users or emails... (e.g., Kohail, admin)">
            <div id="trigger-posts-search" class="search-btn" aria-hidden="true"></div>
        </div>

        <div class="chips" id="filterChips">
            <button type="button" class="chip on" data-f="all">الكل</button>
            <button type="button" class="chip" data-f="admin">مدراء</button>
            <button type="button" class="chip" data-f="user">مستخدمون</button>
            <button type="button" class="chip" data-f="blocked">محظورون</button>
            <button type="button" class="chip" data-f="top">مميّزون</button>
            <span class="result-count">المعروض: <b id="visibleCount">{{ $users->count() }}</b></span>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th class="actions-col">العمليات</th>
                        <th>ID</th>
                        <th>الاسم الكامل (Name)</th>
                        <th>البريد الإلكتروني (Email)</th>
                        <th>رقم الجوال (Mobile)</th>
                        <th style="text-align:center">نوع الصلاحية (Type)</th>
                    </tr>
                </thead>
                <tbody>
@foreach ($users as $index => $user)
    <tr
        class="post-row stagger-item {{ $user->is_blocked ? 'account-blocked-row' : '' }}"
        data-index="{{ $index }}"
        data-id="{{ $user->id }}"
        data-type="{{ $user->type }}"
        data-blocked="{{ $user->is_blocked ? 1 : 0 }}"
        data-top="{{ $user->is_top ? 1 : 0 }}"
    >
        <td class="actions-col">
            <div class="action-group">
                {{-- القفل: مدير = مغلق 🔒 ، مستخدم = مفتوح 🔓 --}}
                <a href="{{ route('admin.user.toggle_role', $user->id) }}" data-a="role"
                    onclick="return confirm('هل أنت متأكد من رغبتك في تبديل صلاحيات هذا الحساب؟')"
                    class="act act-role {{ $user->type == 'admin' ? 'is-admin' : '' }}"
                    data-tip="{{ $user->type == 'admin' ? 'تحويل إلى مستخدم' : 'ترقية إلى مدير' }}"
                    aria-label="تغيير الصلاحية">
                    <span class="ico">{{ $user->type == 'admin' ? '🔒' : '🔓' }}</span>
                    <span class="ring" style="color:#013E37"></span>
                </a>

                {{-- الحظر: المحظور يصير أحمر غامق --}}
                <a href="{{ route('admin.user.toggle_block', $user->id) }}" data-a="block"
                    onclick="return confirm('هل أنت متأكد من تغيير حالة حظر هذا الحساب؟')"
                    class="act act-block {{ $user->is_blocked ? 'is-blocked' : '' }}"
                    data-tip="{{ $user->is_blocked ? 'فك الحظر' : 'حظر الحساب' }}"
                    aria-label="{{ $user->is_blocked ? 'فك الحظر' : 'حظر الحساب' }}">
                    <span class="ico">🚫</span>
                    <span class="ring" style="color:#ea580c"></span>
                </a>

                {{-- التميّز --}}
                <a href="{{ route('admin.user.toggle_top', $user->id) }}" data-a="top"
                    onclick="return confirm('هل أنت متأكد من تغيير رتبة التميز لهذا الموظف؟')"
                    class="act act-top {{ $user->is_top ? 'is-top' : '' }}"
                    data-tip="{{ $user->is_top ? 'إلغاء التميز' : 'تعيين كمميز' }}"
                    aria-label="{{ $user->is_top ? 'إلغاء التميز' : 'تعيين كمميز' }}">
                    <span class="ico">🌟</span>
                    <span class="ring" style="color:#fbbf24"></span>
                </a>

                <a href="{{ route('admin.user.impersonate', $user->id) }}" data-a="spy"
                    onclick="return confirm('هل أنت متأكد من بدء جلسة التفتيش السري والدخول بهوية هذا الحساب حياً؟')"
                    class="act act-spy" data-tip="التفتيش السري" aria-label="التفتيش السري">
                    <span class="ico">🕵️‍♂️</span>
                    <span class="ring" style="color:#10b981"></span>
                </a>

                <a href="{{ route('admin.user.force_delete', $user->id) }}" data-a="del"
                    onclick="return confirm('هل أنت متأكد من حذف هذا الحساب نهائياً؟')"
                    class="act act-del" data-tip="حذف الحساب" aria-label="حذف الحساب">
                    <span class="ico">❌</span>
                    <span class="ring" style="color:#ef4444"></span>
                </a>
            </div>
        </td>

        <td class="id-cell">#{{ $user->id }}</td>

        <td class="post-title">
            <div class="user-cell">
                <span class="avatar">{{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}</span>
                <span>
                    👤 <span class="post-name">{{ $user->name }}</span>
                    @if ($user->is_blocked)
                        <span class="tag-blocked">محظور</span>
                    @endif
                </span>
            </div>
        </td>

        <td class="content-cell post-author" title="{{ $user->email }}">
            {{ $user->email }}
        </td>

        <td style="direction:ltr;text-align:right">
            {{ $user->mobile ?? 'لا يوجد' }}
        </td>

        <td>
            <div class="type-col">
                @if ($user->is_top)
                    <span class="royal-badge-glow-top">PREMIUM 🌟</span>
                @endif

                <span class="type-pill"
                    style="background: {{ $user->type == 'admin' ? '#b45309' : '#0369a1' }}">
                    {{ strtoupper($user->type) }}
                </span>
            </div>
        </td>
    </tr>
@endforeach
                    <tr class="empty-row" id="emptyRow">
                        <td colspan="6">🔍 لا توجد نتائج مطابقة</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            /* success toast */
            @if (session('success'))
                var toast = document.getElementById('custom-toast-notification');
                if (toast) {
                    setTimeout(function() {
                        toast.classList.add('show-toast-ultra');
                    }, 300);
                    setTimeout(function() {
                        toast.style.transform = "translateX(450px) scale(.9)";
                        toast.style.opacity = "0";
                    }, 3800);
                    setTimeout(function() {
                        toast.classList.remove('show-toast-ultra');
                        toast.style.transform = "";
                        toast.style.opacity = "";
                    }, 4300);
                }
            @endif

            /* search (starts-with, as before) + quick filters */
            var input = document.getElementById('post-search-input'),
                btn = document.getElementById('trigger-posts-search'),
                rows = document.querySelectorAll('.post-row'),
                chips = document.getElementById('filterChips'),
                empty = document.getElementById('emptyRow'),
                count = document.getElementById('visibleCount'),
                filter = 'all';

            function matchFilter(r) {
                if (filter === 'admin') return r.dataset.type === 'admin';
                if (filter === 'user') return r.dataset.type !== 'admin';
                if (filter === 'blocked') return r.dataset.blocked === '1';
                if (filter === 'top') return r.dataset.top === '1';
                return true;
            }

            function apply() {
                var q = input.value.toLowerCase().trim(),
                    shown = 0;
                rows.forEach(function(row) {
                    var t = row.querySelector('.post-name'),
                        a = row.querySelector('.post-author');
                    var name = t ? t.textContent.toLowerCase().trim() : '';
                    var email = a ? a.textContent.toLowerCase().trim() : '';
                    var ok = matchFilter(row) && (name.startsWith(q) || email.startsWith(q));
                    row.classList.toggle('hide-row-premium', !ok);
                    if (ok) shown++;
                });
                count.textContent = shown;
                empty.classList.toggle('show', shown === 0);
            }
            if (btn) btn.addEventListener('click', function() {
                input.focus();
            });
            input.addEventListener('input', apply);
            chips.addEventListener('click', function(e) {
                var c = e.target.closest('.chip');
                if (!c) return;
                chips.querySelectorAll('.chip').forEach(function(x) {
                    x.classList.remove('on');
                });
                c.classList.add('on');
                filter = c.dataset.f;
                apply();
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === '/' && document.activeElement !== input) {
                    e.preventDefault();
                    input.focus();
                }
            });

            /* remember the action, block double-clicks, replay the animation after reload */
            document.querySelectorAll('.act').forEach(function(a) {
                a.addEventListener('click', function(e) {
                    if (e.defaultPrevented) return;
                    var row = a.closest('.post-row');
                    try {
                        sessionStorage.setItem('cfAct', JSON.stringify({
                            id: row.dataset.id,
                            a: a.dataset.a
                        }));
                    } catch (x) {}
                    setTimeout(function() {
                        a.classList.add('busy');
                    }, 0);
                });
            });
            try {
                var last = JSON.parse(sessionStorage.getItem('cfAct') || 'null');
                sessionStorage.removeItem('cfAct');
                if (last) {
                    var r = document.querySelector('.post-row[data-id="' + last.id + '"]');
                    var b = r && r.querySelector('.act[data-a="' + last.a + '"]');
                    if (r && b) {
                        r.scrollIntoView({
                            block: 'center',
                            behavior: 'smooth'
                        });
                        r.classList.add('just-row');
                        b.classList.add('just-changed');
                    }
                }
            } catch (x) {}
        });
        /* ===== الثيم واللغة ===== */
        var root = document.documentElement,
            sw = document.getElementById('themeToggleSwitch'),
            knob = document.getElementById('themeToggleKnob'),
            langBtn = document.getElementById('langSwitcherBtn');

        function setTheme(dark, save) {
            if (dark) root.setAttribute('data-theme', 'dark');
            else root.removeAttribute('data-theme');
            knob.textContent = dark ? '🌙' : '☀️';
            sw.setAttribute('aria-pressed', dark);
            if (save) try {
                localStorage.setItem('cf_theme', dark ? 'dark' : 'light');
            } catch (x) {}
        }
        sw.addEventListener('click', function() {
            setTheme(root.getAttribute('data-theme') !== 'dark', true);
        });
        sw.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                sw.click();
            }
        });
        setTheme(root.getAttribute('data-theme') === 'dark', false);

        /* قاموس الترجمة (عربي → إنجليزي) */
        var EN = {
            'صندوق بيانات الحسابات والمستخدمين 👤': 'Accounts & Users Panel 👤',
            'إجمالي الحسابات': 'Total accounts',
            'مدراء': 'Admins',
            'محظورون': 'Blocked',
            'مميّزون': 'Featured',
            'مستخدمون': 'Users',
            'الكل': 'All',
            'المعروض:': 'Showing:',
            'العمليات': 'Actions',
            'الاسم الكامل (Name)': 'Full Name',
            'البريد الإلكتروني (Email)': 'Email',
            'رقم الجوال (Mobile)': 'Mobile',
            'نوع الصلاحية (Type)': 'Role',
            'محظور': 'Blocked',
            'لا يوجد': 'N/A',
            '🔍 لا توجد نتائج مطابقة': '🔍 No matching results',
            'تحديث لوحة البيانات ⚡': 'Dashboard updated ⚡',
            'تحويل إلى مستخدم': 'Demote to user',
            'ترقية إلى مدير': 'Promote to admin',
            'فك الحظر': 'Unblock',
            'حظر الحساب': 'Block account',
            'إلغاء التميز': 'Remove featured',
            'تعيين كمميز': 'Set as featured',
            'التفتيش السري': 'Impersonate',
            'حذف الحساب': 'Delete account',
            'تغيير الصلاحية': 'Change role',
            'هل أنت متأكد من رغبتك في تبديل صلاحيات هذا الحساب؟': 'Are you sure you want to change this account\'s role?',
            'هل أنت متأكد من تغيير حالة حظر هذا الحساب؟': 'Are you sure you want to change this account\'s block status?',
            'هل أنت متأكد من تغيير رتبة التميز لهذا الموظف؟': 'Are you sure you want to change this user\'s featured status?',
            'هل أنت متأكد من بدء جلسة التفتيش السري والدخول بهوية هذا الحساب حياً؟': 'Are you sure you want to start an impersonation session as this account?',
            'هل أنت متأكد من حذف هذا الحساب نهائياً؟': 'Are you sure you want to permanently delete this account?'
        };
        var PREFIX = [
            ['العدد الإجمالي:', 'Total:']
        ];
        var PH_AR = 'ابحث عن مستخدم أو بريد... (مثال: Kohail, admin)',
            PH_EN = 'Search for users or emails... (e.g., Kohail, admin)';

        function trTxt(s) {
            var t = s.trim(),
                lead = s.slice(0, s.indexOf(t)),
                trail = s.slice(lead.length + t.length);
            if (EN[t]) return lead + EN[t] + trail;
            for (var i = 0; i < PREFIX.length; i++)
                if (t.indexOf(PREFIX[i][0]) === 0) return lead + PREFIX[i][1] + t.slice(PREFIX[i][0].length) + trail;
            return s;
        }

        /* نجمع العناصر القابلة للترجمة مرة وحدة (النسخة العربية الأصلية) */
        var tNodes = [],
            tAttrs = [];
        var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT);
        while (walker.nextNode()) {
            var n = walker.currentNode,
                p = n.parentNode.nodeName;
            if (p === 'SCRIPT' || p === 'STYLE') continue;
            if (trTxt(n.nodeValue) !== n.nodeValue) tNodes.push({
                n: n,
                ar: n.nodeValue
            });
        }
        document.querySelectorAll('[data-tip],[aria-label]').forEach(function(el) {
            ['data-tip', 'aria-label'].forEach(function(a) {
                var v = el.getAttribute(a);
                if (v && EN[v]) tAttrs.push({
                    el: el,
                    a: a,
                    ar: v
                });
            });
        });

        /* confirm يترجم رسالته حسب اللغة */
        var nativeConfirm = window.confirm;
        window.confirm = function(m) {
            return nativeConfirm.call(window, root.lang === 'en' && EN[m] ? EN[m] : m);
        };

function setLang(l, save) {
    var en = l === 'en';

    /* 1) الزر أولاً: يعرض اسم اللغة المقابلة */
    langBtn.textContent = en ? 'العربية' : 'English';
    langBtn.setAttribute('data-lang', en ? 'en' : 'ar');

    /* 2) اتجاه الصفحة */
    root.lang = en ? 'en' : 'ar';
    root.dir = en ? 'ltr' : 'rtl';

    /* 3) الترجمة (محمية بـ try عشان ما توقف باقي الكود) */
    try {
        tNodes.forEach(function(o) { o.n.nodeValue = en ? trTxt(o.ar) : o.ar; });
        tAttrs.forEach(function(o) { o.el.setAttribute(o.a, en ? EN[o.ar] : o.ar); });
        input.placeholder = en ? PH_EN : PH_AR;
    } catch (err) { console.error('translate error:', err); }

    if (save) try { localStorage.setItem('cf_lang', l); } catch (x) {}
}

langBtn.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();   /* يمنع أي سكربت ثاني من التدخل بالزر */
    setLang(root.lang === 'en' ? 'ar' : 'en', true);
});

setLang(root.lang === 'en' ? 'en' : 'ar', false);    </script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // إنشاء مراقب الشاشة
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            // لا يتم تفعيل التأخير والحركة إلا عندما يدخل الصف في شاشة المستخدم
            if (entry.isIntersecting) {
                const row = entry.target;

                // الكود الخاص بك للحساب الذكي (باقي القسمة)
                row.style.setProperty('--stagger-delay', `${(index % 8) * 40}ms`);

                // إلغاء مراقبة الصف بعد ظهوره لمرة واحدة لتحسين الأداء
                observer.unobserve(row);
            }
        });
    }, { threshold: 0.1 }); // يبدأ التفاعل فور ظهور 10% من الصف

    // تمرير كافة الصفوف للمراقب بدلاً من تشغيلها فوراً
    document.querySelectorAll('.stagger-item').forEach((row) => {
        observer.observe(row);
    });
});
</script>

</body>

</html>
