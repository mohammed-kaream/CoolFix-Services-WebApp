@extends('perblad.layout')
@section('title', __('FAQ') . ' | COOLFIX')
@section('content')
    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
<h1>{{ __('Frequently Asked Questions') }}</h1>
<ul>
    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
    <li> {{ __('/ FAQ') }}</li>
</ul>                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!-- START FAQ (cyber-lab style) -->
    <section class="faq_area section-padding cf-faq" id="cfFaq">
        <div class="container">
            <div class="section-title">
<h4>{{ __('Have Questions') }}</h4>
<h1>{{ __('Everything You Need To Know') }}</h1>            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="cf-filter">
                        <span>&gt;_</span>
<input type="text" id="cfFaqFilter" placeholder="{{ __('Search questions...') }}" autocomplete="off" aria-label="{{ __('Search questions...') }}">                        <b id="cfFaqCount">{{ count($aboutFaqs) }}</b>
                    </div>
                    <div class="accordion" id="accordionExample">
                        @foreach ($aboutFaqs as $index => $faq)
                            <div class="accordion-item {{ $index == 0 ? 'is-open' : '' }} home-stagger-item">
                                <h2 class="accordion-header" id="heading_{{ $index }}">
                                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse_{{ $index }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse_{{ $index }}">
                                        <em class="cf-q-id">Q-{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</em>
<span class="cf-q-text">{{ __($faq->question) }}</span>
                                    </button>
                                </h2>
                                <div id="collapse_{{ $index }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading_{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
<span class="cf-dec" data-text="{{ __($faq->answer) }}">{{ __($faq->answer) }}</span>                                    </div>
                                </div>
                            </div><!-- END ACCORDION ITEM -->
                        @endforeach
                    </div>
                </div><!-- END COL  -->
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="pt_faq cf-holo">
                        <span class="cf-holo-ring"></span>
                        <img src="{{ asset('webfront/images/brand/faq-illustration.svg') }}" class="img-fluid"
                            alt="{{ __('Technician answering a question') }}" />
                    </div>
                </div><!-- END COL  -->
            </div><!--END  ROW  -->
            <div class="row justify-content-center text-center" style="margin-top:40px;">
                <div class="col-lg-8">
<p style="font-size:16px;margin-bottom:20px;">{{ __("Still have a question we didn't answer?") }}</p>
<a href="tel:+970598924040" class="cta"><span>{{ __('Call 059 892 4040') }}</span>                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div><!--- END CONTAINER -->

        <style>
            /* default theme look is kept; only the open-animation extras live here */
            .cf-faq{--c:#22e3ff;--g:#39ff88;position:relative}
            .cf-filter{display:flex;align-items:center;gap:10px;margin-bottom:16px;padding:0 14px;border-radius:12px;background:rgba(255,255,255,.75);border:1px solid rgba(0,0,0,.15);transition:.25s}
            .cf-filter:focus-within{border-color:var(--c);box-shadow:0 0 0 3px rgba(34,227,255,.25)}
            .cf-filter span{color:#0aa86a;font:700 1rem Consolas,monospace}
            .cf-filter input{flex:1;min-width:0;background:transparent;border:0;outline:0;color:inherit;padding:12px 0;font:600 .95rem Consolas,monospace}
            .cf-filter b{font:.75rem Consolas,monospace;opacity:.6}

            .cf-faq .accordion-item{position:relative;overflow:hidden;transform-origin:50% 0}
            .cf-faq .accordion-item::before{content:"";position:absolute;left:0;top:0;bottom:0;width:3px;z-index:1;background:linear-gradient(var(--c),var(--g));
                transform:scaleY(0);transform-origin:top;transition:transform .5s cubic-bezier(.2,.9,.3,1)}
            .cf-faq .accordion-item.is-open::before{transform:scaleY(1)}
            .cf-faq .accordion-item.is-open:not(.first-paint){animation:cfUnfold .65s cubic-bezier(.2,.9,.3,1.1)}
            @keyframes cfUnfold{0%{transform:perspective(900px) rotateX(-16deg) scale(.97)}55%{transform:perspective(900px) rotateX(3deg)}100%{transform:none}}
            .cf-faq .accordion-item.is-open::after{content:"";position:absolute;left:0;right:0;height:70px;top:-70px;pointer-events:none;z-index:2;
                background:linear-gradient(to bottom,transparent,rgba(57,255,136,.28),transparent);border-bottom:1px solid rgba(57,255,136,.9);animation:cfLaser .95s ease-out forwards}
            @keyframes cfLaser{to{top:105%}}

            .cf-faq .accordion-button{display:flex;align-items:center}
            .cf-q-id{font:700 .72rem Consolas,monospace;font-style:normal;color:#02121a;background:var(--c);padding:3px 8px;border-radius:6px;margin-right:12px;flex:none}
            .cf-faq .accordion-button:not(.collapsed) .cf-q-id{background:var(--g)}
            .cf-dec{white-space:pre-wrap}
            .cf-p{position:absolute;width:5px;height:5px;background:var(--g);pointer-events:none;z-index:3;box-shadow:0 0 8px var(--g);animation:cfBurst .7s ease-out forwards}
            @keyframes cfBurst{to{transform:translate(var(--x),var(--y)) scale(0);opacity:0}}

            .cf-holo{position:relative;display:flex;align-items:center;justify-content:center}
            .cf-holo img{position:relative;animation:cfFloat 5s ease-in-out infinite}
            .cf-holo-ring{position:absolute;width:min(78%,420px);aspect-ratio:1;border-radius:50%;border:2px dashed rgba(34,227,255,.55);animation:cfSpinR 18s linear infinite}
            @keyframes cfFloat{50%{transform:translateY(-14px)}}
            @keyframes cfSpinR{to{transform:rotate(360deg)}}
            @media(prefers-reduced-motion:reduce){.cf-faq *,.cf-faq *::before,.cf-faq *::after{animation:none!important;transition:none!important}}
        </style>

        <script>
        (function () {
            var faq = document.getElementById('cfFaq'); if (!faq) return;
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            faq.querySelectorAll('.accordion-item.is-open').forEach(function (i) { i.classList.add('first-paint'); });

            /* decrypt effect */
            var glyphs = '01#$%&*<>/|[]{}ΩΔ§¤';
            function decrypt(el) {
                var t = el.getAttribute('data-text') || ''; clearInterval(el._id);
                if (reduce || !t) { el.textContent = t; return; }
                var n = t.length, f = 0, total = Math.min(34, Math.max(18, n / 6));
                el._id = setInterval(function () {
                    f++; var rv = Math.floor(n * f / total), out = '';
                    for (var i = 0; i < n; i++) { var ch = t.charAt(i); out += (i < rv || /\s/.test(ch)) ? ch : glyphs.charAt(Math.floor(Math.random() * glyphs.length)); }
                    el.textContent = out;
                    if (f >= total) { clearInterval(el._id); el.textContent = t; }
                }, 32);
            }
            /* particle burst */
            function burst(item) {
                if (reduce) return;
                var btn = item.querySelector('.accordion-button'), r = btn.getBoundingClientRect(), ir = item.getBoundingClientRect();
                for (var i = 0; i < 14; i++) {
                    var p = document.createElement('i'), ang = Math.random() * Math.PI * 2, d = 30 + Math.random() * 50;
                    p.className = 'cf-p'; p.style.left = (r.right - ir.left - 34) + 'px'; p.style.top = (r.top - ir.top + r.height / 2) + 'px';
                    p.style.setProperty('--x', Math.cos(ang) * d + 'px'); p.style.setProperty('--y', Math.sin(ang) * d + 'px');
                    item.appendChild(p); setTimeout(function (el) { el.remove(); }.bind(null, p), 750);
                }
            }
            faq.addEventListener('show.bs.collapse', function (e) {
                var item = e.target.closest('.accordion-item'); if (!item) return;
                item.classList.remove('first-paint'); item.classList.add('is-open');
                burst(item); var d = item.querySelector('.cf-dec'); if (d) decrypt(d);
            });
            faq.addEventListener('hide.bs.collapse', function (e) {
                var item = e.target.closest('.accordion-item'); if (item) item.classList.remove('is-open');
            });

            /* live filter */
            var inp = document.getElementById('cfFaqFilter'), cnt = document.getElementById('cfFaqCount');
            inp.addEventListener('input', function () {
                var q = inp.value.trim().toLowerCase(), shown = 0;
                faq.querySelectorAll('.accordion-item').forEach(function (it) {
                    var ok = !q || it.textContent.toLowerCase().indexOf(q) > -1;
                    it.style.display = ok ? '' : 'none'; if (ok) shown++;
                });
                cnt.textContent = shown;
            });
        })();
        </script>
    </section>
    <!-- END FAQ -->

<!-- START COOLFIX HACKER AI FAQ -->
<section class="cf-hack home-stagger-item" id="cfHack">
    <canvas id="cfMatrix" aria-hidden="true"></canvas>
    <div class="cf-floor" aria-hidden="true"></div>
    <div class="cf-cube cf-cube-a" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <div class="cf-cube cf-cube-b" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i></div>
    <div class="cf-scan" aria-hidden="true"></div>
    <div class="cf-spot" id="cfSpot" aria-hidden="true"></div>

    <div class="cf-inner">
        <div class="cf-topbar">
            <span class="cf-dot r"></span><span class="cf-dot y"></span><span class="cf-dot g"></span>
            <span class="cf-path">coolfix@fridge-lab:~$ <b id="cfBoot"></b><u class="cf-caret"></u></span>
            <button type="button" class="cf-mini" id="cfToggleMatrix" title="{{ __('تشغيل/إيقاف الخلفية') }}">⚡ FX</button>
        </div>

        <h2 class="cf-title" data-text="{{ __('مختبر صيانة الثلاجات الذكي') }}">{{ __('مختبر صيانة الثلاجات الذكي') }}</h2>
        <p class="cf-sub">{{ __('اكتب العطل، والذكاء الاصطناعي يشخّصه ويعطيك الحل بثواني') }}</p>

        <!-- 3 animated cards -->
        <div class="cf-cards">
            <div class="cf-card" data-tilt>
                <svg viewBox="0 0 120 150" class="cf-svg" aria-hidden="true">
                    <defs>
                        <linearGradient id="cfFr" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0" stop-color="#0e3a52"/><stop offset="1" stop-color="#06202e"/>
                        </linearGradient>
                    </defs>
                    <rect x="25" y="8" width="70" height="134" rx="9" fill="url(#cfFr)" stroke="#22e3ff" stroke-width="2"/>
                    <line x1="25" y1="52" x2="95" y2="52" stroke="#22e3ff" stroke-width="1.5" opacity=".7"/>
                    <rect x="84" y="22" width="4" height="18" rx="2" fill="#22e3ff"/>
                    <rect x="84" y="68" width="4" height="30" rx="2" fill="#22e3ff"/>
                    <circle cx="36" cy="20" r="3" fill="#39ff88" class="cf-led"/>
                    <g class="cf-flake"><circle cx="45" cy="80" r="2.2"/><circle cx="60" cy="70" r="1.6"/><circle cx="70" cy="90" r="2"/><circle cx="52" cy="108" r="1.7"/><circle cx="66" cy="120" r="2.2"/></g>
                    <rect x="25" y="8" width="70" height="134" rx="9" fill="#22e3ff" opacity=".07" class="cf-cold"/>
                </svg>
                <h4>{{ __('التبريد لا يعمل') }}</h4>
                <p>{{ __('حرارة، عزل، وجوان الباب') }}</p>
            </div>

            <div class="cf-card" data-tilt>
                <svg viewBox="0 0 120 150" class="cf-svg" aria-hidden="true">
                    <circle cx="60" cy="75" r="52" fill="none" stroke="#22e3ff" stroke-width="2" stroke-dasharray="6 6" class="cf-ring"/>
                    <circle cx="60" cy="75" r="40" fill="#06202e" stroke="#39ff88" stroke-width="2"/>
                    <g class="cf-fan">
                        <path d="M60 75 C52 55 62 38 78 42 C72 52 68 62 60 75Z" fill="#22e3ff"/>
                        <path d="M60 75 C80 67 97 77 93 93 C83 87 73 83 60 75Z" fill="#22e3ff"/>
                        <path d="M60 75 C68 95 58 112 42 108 C48 98 52 88 60 75Z" fill="#22e3ff"/>
                        <path d="M60 75 C40 83 23 73 27 57 C37 63 47 67 60 75Z" fill="#22e3ff"/>
                    </g>
                    <circle cx="60" cy="75" r="7" fill="#39ff88"/>
                </svg>
                <h4>{{ __('الضاغط والمروحة') }}</h4>
                <p>{{ __('أصوات، طقطقة، وسخونة زائدة') }}</p>
            </div>

            <div class="cf-card" data-tilt>
                <svg viewBox="0 0 120 150" class="cf-svg" aria-hidden="true">
                    <path d="M15 105 A45 45 0 0 1 105 105" fill="none" stroke="#0e3a52" stroke-width="12" stroke-linecap="round"/>
                    <path d="M15 105 A45 45 0 0 1 105 105" fill="none" stroke="#22e3ff" stroke-width="12" stroke-linecap="round" stroke-dasharray="141" stroke-dashoffset="141" class="cf-arc"/>
                    <g class="cf-needle"><line x1="60" y1="105" x2="60" y2="68" stroke="#39ff88" stroke-width="3" stroke-linecap="round"/></g>
                    <circle cx="60" cy="105" r="6" fill="#39ff88"/>
                    <text x="60" y="140" text-anchor="middle" class="cf-temp" id="cfTemp">-18°C</text>
                </svg>
                <h4>{{ __('حرارة الفريزر') }}</h4>
                <p>{{ __('ثلج زائد، تسريب، وحساس الحرارة') }}</p>
            </div>
        </div>

        <!-- Search -->
        <form action="{{ route('faq.ai_search') }}" method="POST" class="cf-form" id="cfForm">
            @csrf
            <div class="cf-glow">
                <div class="cf-field">
                    <span class="cf-prompt">&gt;_</span>
                    <input type="text" name="question" id="faq-ai-input" maxlength="500" required autocomplete="off"
                        placeholder="{{ __('مثال: الثلاجة بتطلع صوت وما عم تبرّد، شو الحل؟') }}"
                        value="{{ session('user_question') }}">
                    <button type="button" class="cf-mini" id="cfMic" title="{{ __('إدخال صوتي') }}" hidden>🎤</button>
                    <span class="cf-count" id="cfCount">0/500</span>
                </div>
            </div>
            <button type="submit" class="cf-go">{{ __('🛰️ ابدأ الفحص') }}</button>
        </form>

        <div class="cf-chips" id="cfChips">
            <button type="button" data-q="{{ __('الثلاجة ما بتبرد بس الفريزر شغال') }}">{{ __('❄️ ما بتبرد') }}</button>
            <button type="button" data-q="{{ __('الفريزر بيتجمد عليه ثلج كتير') }}">{{ __('🧊 ثلج زائد') }}</button>
            <button type="button" data-q="{{ __('الثلاجة بتسرّب ميّ من تحت') }}">{{ __('💧 تسريب ميّ') }}</button>
            <button type="button" data-q="{{ __('الضاغط بيشتغل ويطفي كل دقيقة') }}">{{ __('🔁 الضاغط يفصل') }}</button>
            <button type="button" data-q="{{ __('صوت طقطقة وطنين من ورا الثلاجة') }}">{{ __('🔊 صوت غريب') }}</button>
        </div>

        <div class="cf-status">
            <span><i class="cf-pulse"></i> {{ __('النظام متصل') }}</span>
            <span>AI: GEMINI</span>
            <span>{{ __('زمن الاستجابة:') }} <b id="cfPing">--</b>ms</span>
            <span id="cfClock">--:--:--</span>
        </div>

        <!-- Loading overlay -->
        <div class="cf-loading" id="cfLoading" aria-live="polite">
            <div class="cf-ring2"></div>
            <pre id="cfLog"></pre>
            <div class="cf-bar"><i></i></div>
        </div>

        @if (session('ai_answer'))
            <div class="cf-answer" id="cfAnswer">
                <div class="cf-ans-head">
                    <span>{{ __('🤖 نتيجة التشخيص') }}</span>
                    <button type="button" class="cf-mini" id="cfCopy">{{ __('📋 نسخ') }}</button>
                </div>
                <div class="cf-ans-body" id="cfAnsBody" data-text="{{ session('ai_answer') }}"></div>
                <div class="cf-book">
                    <button type="button" class="cf-go" id="cfBookBtn">{{ __('🔧 احجز فني') }}</button>
                    <span>{{ __('بدك فني يشوف الجهاز؟ بنعبّي لك الطلب بعطلك وتشخيص المساعد.') }}</span>
                </div>
                <div class="cf-ans-foot">{{ __('⚠️ تشخيص مبدئي. للأعطال الكهربائية أو الغاز اتصل بفني COOLFIX.') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="cf-error">⚠️ {{ session('error') }}</div>
        @endif
    </div>

    <!-- BOOK-A-TECHNICIAN MODAL -->
    <div class="cf-modal" id="cfModal" role="dialog" aria-modal="true" aria-labelledby="cfMTitle" hidden>
        <div class="cf-m-box">
            <button type="button" class="cf-m-x" id="cfMClose" aria-label="{{ __('إغلاق') }}">×</button>
            <div id="cfMForm">
                <h3 id="cfMTitle">{{ __('🔧 احجز فني صيانة') }}</h3>
                <p class="cf-m-sub">{{ __('عبّي بياناتك، وعطلك وتشخيص المساعد بينرسلوا معاك تلقائياً.') }}</p>
                <form id="cfBookForm" novalidate autocomplete="off" onsubmit="return false;">
                    <input type="text" name="website" class="cf-hp" tabindex="-1" autocomplete="new-password" aria-hidden="true">
                    <div class="cf-m-grid">
                        <label>{{ __('الاسم') }}<input type="text" name="name" maxlength="30" required placeholder="{{ __('اسمك') }}"><small data-e="name"></small></label>
                        <label>{{ __('الجوال / واتساب') }}<input type="tel" name="phone" maxlength="20" required placeholder="059xxxxxxx" dir="ltr"><small data-e="phone"></small></label>
                        <label>{{ __('ماركة الثلاجة') }}<input type="text" name="brand" maxlength="100" required placeholder="LG, Samsung..."><small data-e="brand"></small></label>
                        <label>{{ __('المنطقة / الحي') }}<input type="text" name="area" maxlength="150" required placeholder="{{ __('مثال: الرمال') }}"><small data-e="area"></small></label>
                    </div>
                    <label>{{ __('وصف العطل (معبّى من سؤالك، تقدر تعدّله)') }}
                        <textarea name="describe" rows="3" maxlength="1000" id="cfMDescribe"></textarea><small data-e="describe"></small>
                    </label>
                    <div class="cf-m-diag" id="cfMDiag" hidden>{{ __('🤖 تشخيص المساعد مرفق مع الطلب') }}</div>
                    <div class="cf-m-err" id="cfMErr" hidden></div>
                    <button type="submit" class="cf-go cf-m-send" id="cfMSend">{{ __('إرسال الطلب 🛰️') }}</button>
                </form>
            </div>
            <div id="cfMDone" hidden>
                <div class="cf-m-ok">✔</div>
                <h3>{{ __('وصلنا طلبك!') }}</h3>
                <p class="cf-m-sub">{{ __('رقم طلبك:') }} <b id="cfMRef" dir="ltr"></b><br>{{ __('رح نتواصل معك على الجوال بأقرب وقت.') }}</p>
                <button type="button" class="cf-go cf-m-send" id="cfMOk">{{ __('تمام') }}</button>
            </div>
        </div>
    </div>
    <style>
        .cf-modal{--c:#22e3ff;--g:#39ff88;--ln:rgba(34,227,255,.3);position:fixed;inset:0;z-index:2147483000;display:flex;align-items:center;justify-content:center;padding:16px;
            background:rgba(1,6,10,.78);backdrop-filter:blur(6px);direction:rtl;font-family:'Cairo','Segoe UI',Tahoma,sans-serif}
        .cf-modal[hidden]{display:none}
        .cf-modal *{box-sizing:border-box}
        .cf-m-box{position:relative;width:min(560px,100%);max-height:92vh;overflow:auto;padding:26px 24px 24px;border-radius:18px;color:#d6f6ff;
            background:linear-gradient(160deg,#0a2f45,#04121c);border:1px solid var(--ln);box-shadow:0 0 60px rgba(34,227,255,.3);animation:cfMIn .35s cubic-bezier(.2,.9,.3,1.2)}
        @keyframes cfMIn{from{opacity:0;transform:translateY(24px) scale(.96)}}
        .cf-m-box::before{content:"";position:absolute;top:0;left:12%;right:12%;height:2px;background:linear-gradient(90deg,transparent,var(--c),var(--g),transparent)}
        .cf-m-x{position:absolute;top:10px;left:12px;width:34px;height:34px;border-radius:50%;border:1px solid var(--ln);background:rgba(34,227,255,.08);color:var(--c);font-size:1.4rem;line-height:1;cursor:pointer}
        .cf-m-x:hover{background:rgba(34,227,255,.22)}
        .cf-m-box h3{margin:0 0 4px;color:#fff;font-weight:900;font-size:1.3rem;text-shadow:0 0 14px rgba(34,227,255,.6)}
        .cf-m-sub{margin:0 0 16px;color:#8fb8c8;font-size:.92rem;line-height:1.7}
        .cf-m-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .cf-m-box label{display:block;font-weight:700;font-size:.85rem;color:#bfeaf7;margin-bottom:12px}
        .cf-m-box input,.cf-m-box textarea{display:block;width:100%;margin-top:6px;padding:11px 13px;border-radius:11px;border:1px solid var(--ln);background:#04141f;color:#eaffff;font:600 .95rem inherit;font-family:inherit;outline:0;transition:.2s}
        .cf-m-box input:focus,.cf-m-box textarea:focus{border-color:var(--c);box-shadow:0 0 18px rgba(34,227,255,.4)}
        .cf-m-box label.bad input,.cf-m-box label.bad textarea{border-color:#ff4d6a}
        .cf-m-box small{display:block;min-height:1em;margin-top:4px;color:#ff8ea1;font-size:.75rem}
        .cf-hp{position:absolute!important;left:-9999px!important;width:1px!important;height:1px!important;opacity:0!important}
        .cf-m-diag{margin:-4px 0 12px;padding:8px 12px;border-radius:10px;background:rgba(57,255,136,.08);border:1px dashed rgba(57,255,136,.4);color:var(--g);font-size:.82rem;font-weight:700}
        .cf-m-err{margin-bottom:12px;padding:10px 12px;border-radius:10px;background:rgba(80,10,20,.6);border:1px solid #ff4d6a;color:#ffb3c0;font-weight:700;font-size:.88rem}
        .cf-m-send{width:100%;padding:14px;border:0;border-radius:14px;cursor:pointer;font:800 1rem inherit;font-family:inherit;color:#02121a;background:linear-gradient(135deg,var(--c),var(--g));box-shadow:0 0 24px rgba(34,227,255,.45);transition:.2s}
        .cf-m-send:hover{transform:translateY(-2px)}
        .cf-m-send:disabled{opacity:.6;cursor:wait;transform:none}
        #cfMDone{text-align:center;padding:10px 0}
        .cf-m-ok{width:72px;height:72px;margin:6px auto 14px;border-radius:50%;display:grid;place-items:center;font-size:2rem;color:#02121a;font-weight:900;background:linear-gradient(135deg,var(--c),var(--g));box-shadow:0 0 40px rgba(57,255,136,.6);animation:cfPop .6s cubic-bezier(.2,.9,.3,1.5)}
        @keyframes cfPop{from{transform:scale(0) rotate(-90deg)}}
        .cf-book{display:flex;align-items:center;gap:14px;flex-wrap:wrap;padding:12px 16px;border-top:1px dashed rgba(57,255,136,.25);background:rgba(57,255,136,.05);color:#9fd9b8;font-size:.88rem;font-weight:600}
        .cf-book .cf-go{padding:11px 22px}
        .cf-m-focus{overflow:hidden}
        @media(max-width:520px){.cf-m-grid{grid-template-columns:1fr}}
        @media(prefers-reduced-motion:reduce){.cf-modal *{animation:none!important}}
    </style>
    <script>
    (function () {
        var modal = document.getElementById('cfModal'), openBtn = document.getElementById('cfBookBtn');
        if (!modal) return;
            var T = {
        sending: @json(__('جاري الإرسال...')),
        tooMany: @json(__('طلبات كثيرة، جرّب بعد دقيقة.')),
        expired: @json(__('انتهت الجلسة، حدّث الصفحة وجرّب مرة ثانية.')),
        failed:  @json(__('صار خطأ، جرّب مرة ثانية أو اتصل على 059 892 4040.')),
        offline: @json(__('تعذّر الاتصال، تأكد من الإنترنت وجرّب مرة ثانية.'))
    };

        document.body.appendChild(modal);   /* move out of the section so the site header can't cover it */
        var form = document.getElementById('cfBookForm'), box = {
            f: document.getElementById('cfMForm'), d: document.getElementById('cfMDone'),
            err: document.getElementById('cfMErr'), send: document.getElementById('cfMSend'),
            ref: document.getElementById('cfMRef'), desc: document.getElementById('cfMDescribe'), diag: document.getElementById('cfMDiag')
        };
        var CSRF = '{{ csrf_token() }}', URL_BOOK = '{{ route('faq.book') }}', lastFocus = null;

        function clearErrors() {
            box.err.hidden = true; box.err.textContent = '';
            form.querySelectorAll('small[data-e]').forEach(function (s) { s.textContent = ''; s.parentNode.classList.remove('bad'); });
        }
        function open() {
            lastFocus = document.activeElement; clearErrors();
            box.f.hidden = false; box.d.hidden = true;
            var q = document.getElementById('faq-ai-input'), a = document.getElementById('cfAnsBody');
            if (!box.desc.value.trim() && q) box.desc.value = q.value;
            box.diag.hidden = !(a && a.getAttribute('data-text'));
            modal.hidden = false; document.documentElement.classList.add('cf-m-focus');
            setTimeout(function () { form.elements['name'].focus(); }, 50);
        }
        function close() { modal.hidden = true; document.documentElement.classList.remove('cf-m-focus'); if (lastFocus) lastFocus.focus(); }

        if (openBtn) openBtn.addEventListener('click', open);
        document.getElementById('cfMClose').addEventListener('click', close);
        document.getElementById('cfMOk').addEventListener('click', close);
        modal.addEventListener('mousedown', function (e) { if (e.target === modal) close(); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) close(); });

        form.addEventListener('submit', function (e) {
            e.preventDefault(); clearErrors();
            box.send.disabled = true; var old = box.send.textContent; box.send.textContent = T.sending;
            fetch(URL_BOOK, {
                method: 'POST', credentials: 'same-origin',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' },
                body: JSON.stringify({ name: form.elements['name'].value, phone: form.phone.value, brand: form.brand.value, area: form.area.value, describe: form.describe.value, website: form.website.value })
            }).then(function (r) { return r.json().catch(function () { return {}; }).then(function (j) { return { s: r.status, j: j }; }); })
            .then(function (res) {
                if (res.s === 200 && res.j.ok) {
                    box.ref.textContent = res.j.ref || ''; box.f.hidden = true; box.d.hidden = false; form.reset(); return;
                }
                if (res.s === 422 && res.j.errors) {
                    Object.keys(res.j.errors).forEach(function (k) {
                        var s = form.querySelector('small[data-e="' + k + '"]');
                        if (s) { s.textContent = res.j.errors[k][0]; s.parentNode.classList.add('bad'); }
                    });
                    return;
                }
                box.err.textContent = res.s === 429 ? T.tooMany : (res.s === 419 ? T.expired : T.failed);
                box.err.hidden = false;
            }).catch(function () {
                box.err.textContent = T.offline; box.err.hidden = false;
            }).finally(function () { box.send.disabled = false; box.send.textContent = old; });
        });
    })();
    </script>

    <style>
.cf-hack{--c:#2dffc4;--g:#7fffe0;--bg:#050b0a;--ln:rgba(45,255,196,.28);            position:relative;overflow:hidden;width:100vw;max-width:none;left:50%;right:50%;margin:40px -50vw;border-radius:0;direction:rtl;
background:radial-gradient(1200px 500px at 50% -10%,#0b2a24 0%,var(--bg) 60%);            border:solid var(--ln);border-width:1px 0;box-shadow:inset 0 0 80px rgba(34,227,255,.06);
            color:#d6f6ff;font-family:'Cairo','Segoe UI',Tahoma,sans-serif;isolation:isolate;box-sizing:border-box}
        .cf-hack *{box-sizing:border-box}
        #cfMatrix{position:absolute;inset:0;width:100%;height:100%;opacity:.35;z-index:-4}
        .cf-floor{position:absolute;left:-50%;right:-50%;bottom:-10%;height:60%;z-index:-3;transform:perspective(420px) rotateX(62deg);
            background-image:linear-gradient(var(--ln) 1px,transparent 1px),linear-gradient(90deg,var(--ln) 1px,transparent 1px);
            background-size:46px 46px;animation:cfGrid 2.2s linear infinite;
            -webkit-mask-image:linear-gradient(to top,#000 20%,transparent 95%);mask-image:linear-gradient(to top,#000 20%,transparent 95%)}
        @keyframes cfGrid{to{background-position:0 46px}}
        .cf-scan{position:absolute;inset:0;z-index:-1;pointer-events:none;
            background:repeating-linear-gradient(0deg,rgba(255,255,255,.03) 0 1px,transparent 1px 3px)}
        .cf-scan::after{content:"";position:absolute;left:0;right:0;height:120px;top:-120px;
            background:linear-gradient(to bottom,transparent,rgba(34,227,255,.12),transparent);animation:cfSweep 6s linear infinite}
        @keyframes cfSweep{to{top:110%}}
        .cf-spot{position:absolute;width:420px;height:420px;border-radius:50%;z-index:-2;pointer-events:none;left:0;top:0;
            background:radial-gradient(circle,rgba(34,227,255,.18),transparent 65%);transform:translate(-50%,-50%);transition:opacity .3s;opacity:0}
        .cf-cube{position:absolute;width:70px;height:70px;transform-style:preserve-3d;z-index:-2;opacity:.8;animation:cfSpin 14s linear infinite}
        .cf-cube-a{top:14%;right:5%}.cf-cube-b{top:52%;left:4%;width:46px;height:46px;animation-duration:20s;animation-direction:reverse}
        .cf-cube i{position:absolute;inset:0;border:1px solid var(--c);background:rgba(34,227,255,.05);box-shadow:0 0 14px rgba(34,227,255,.35) inset}
        .cf-cube i:nth-child(1){transform:translateZ(35px)}.cf-cube i:nth-child(2){transform:rotateY(180deg) translateZ(35px)}
        .cf-cube i:nth-child(3){transform:rotateY(90deg) translateZ(35px)}.cf-cube i:nth-child(4){transform:rotateY(-90deg) translateZ(35px)}
        .cf-cube i:nth-child(5){transform:rotateX(90deg) translateZ(35px)}.cf-cube i:nth-child(6){transform:rotateX(-90deg) translateZ(35px)}
        .cf-cube-b i:nth-child(n){--z:23px}
        .cf-cube-b i:nth-child(1){transform:translateZ(23px)}.cf-cube-b i:nth-child(2){transform:rotateY(180deg) translateZ(23px)}
        .cf-cube-b i:nth-child(3){transform:rotateY(90deg) translateZ(23px)}.cf-cube-b i:nth-child(4){transform:rotateY(-90deg) translateZ(23px)}
        .cf-cube-b i:nth-child(5){transform:rotateX(90deg) translateZ(23px)}.cf-cube-b i:nth-child(6){transform:rotateX(-90deg) translateZ(23px)}
        @keyframes cfSpin{from{transform:rotateX(0) rotateY(0)}to{transform:rotateX(360deg) rotateY(360deg)}}

        .cf-inner{position:relative;max-width:1040px;margin:0 auto;padding:40px 28px 44px}
        .cf-topbar{display:flex;align-items:center;gap:7px;direction:ltr;margin-bottom:22px;font-family:Consolas,'Courier New',monospace;font-size:.85rem;color:var(--g)}
        .cf-dot{width:11px;height:11px;border-radius:50%}.cf-dot.r{background:#ff5f56}.cf-dot.y{background:#ffbd2e}.cf-dot.g{background:#27c93f}
        .cf-path{margin-left:10px;flex:1;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        .cf-caret{display:inline-block;width:8px;height:14px;background:var(--g);margin-left:2px;vertical-align:-2px;animation:cfBlink 1s steps(1) infinite;text-decoration:none}
        @keyframes cfBlink{50%{opacity:0}}
        .cf-mini{background:rgba(34,227,255,.08);border:1px solid var(--ln);color:var(--c);border-radius:8px;padding:4px 10px;cursor:pointer;font:inherit;font-size:.8rem;transition:.2s}
        .cf-mini:hover{background:rgba(34,227,255,.2);box-shadow:0 0 12px rgba(34,227,255,.4)}

        .cf-title{position:relative;text-align:center;margin:0 0 6px;font-size:clamp(1.5rem,4vw,2.3rem);font-weight:900;color:#fff;
            text-shadow:0 0 18px rgba(34,227,255,.7);letter-spacing:.5px}
        .cf-title::before,.cf-title::after{content:attr(data-text);position:absolute;inset:0;overflow:hidden;opacity:.7}
        .cf-title::before{color:#ff2bd6;transform:translate(2px,0);clip-path:inset(0 0 60% 0);animation:cfGl1 4s infinite steps(1)}
        .cf-title::after{color:var(--c);transform:translate(-2px,0);clip-path:inset(60% 0 0 0);animation:cfGl2 4s infinite steps(1)}
        @keyframes cfGl1{0%,92%,100%{transform:translate(0)}93%{transform:translate(3px,-1px)}96%{transform:translate(-3px,1px)}}
        @keyframes cfGl2{0%,90%,100%{transform:translate(0)}91%{transform:translate(-3px,1px)}95%{transform:translate(3px,-1px)}}
        .cf-sub{text-align:center;margin:0 0 24px;color:#8fb8c8;font-size:.98rem}

        .cf-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:26px;perspective:900px}
        .cf-card{position:relative;text-align:center;padding:16px 10px 14px;border-radius:16px;background:linear-gradient(160deg,rgba(14,58,82,.55),rgba(3,11,18,.75));
            border:1px solid var(--ln);backdrop-filter:blur(6px);transform-style:preserve-3d;transition:transform .15s ease,box-shadow .3s;will-change:transform}
        .cf-card:hover{box-shadow:0 0 30px rgba(34,227,255,.3)}
        .cf-card::before{content:"";position:absolute;top:0;left:12%;right:12%;height:2px;background:linear-gradient(90deg,transparent,var(--c),transparent)}
        .cf-svg{width:100%;max-width:130px;height:auto;transform:translateZ(40px);filter:drop-shadow(0 0 10px rgba(34,227,255,.5))}
        .cf-card h4{margin:6px 0 2px;font-size:1.02rem;color:#fff;transform:translateZ(30px)}
        .cf-card p{margin:0;font-size:.8rem;color:#8fb8c8;transform:translateZ(20px)}
        .cf-led{animation:cfBlink 1.4s infinite}
        .cf-flake circle{fill:#bff6ff;animation:cfFall 3s linear infinite}
        .cf-flake circle:nth-child(2){animation-delay:.6s}.cf-flake circle:nth-child(3){animation-delay:1.2s}
        .cf-flake circle:nth-child(4){animation-delay:1.8s}.cf-flake circle:nth-child(5){animation-delay:2.3s}
        @keyframes cfFall{0%{transform:translateY(-22px);opacity:0}20%{opacity:1}100%{transform:translateY(34px);opacity:0}}
        .cf-cold{animation:cfCold 3s ease-in-out infinite}
        @keyframes cfCold{50%{opacity:.22}}
        .cf-fan{transform-origin:60px 75px;animation:cfRot 1.1s linear infinite}
        .cf-ring{transform-origin:60px 75px;animation:cfRot 12s linear infinite reverse}
        @keyframes cfRot{to{transform:rotate(360deg)}}
        .cf-arc{animation:cfArc 4s ease-in-out infinite alternate}
        @keyframes cfArc{to{stroke-dashoffset:40}}
        .cf-needle{transform-origin:60px 105px;animation:cfNeedle 4s ease-in-out infinite alternate;transform:rotate(-70deg)}
        @keyframes cfNeedle{to{transform:rotate(35deg)}}
        .cf-temp{fill:var(--g);font:700 17px Consolas,monospace;direction:ltr;unicode-bidi:bidi-override}

        .cf-form{display:flex;gap:12px;align-items:stretch}
        .cf-glow{position:relative;flex:1;padding:2px;border-radius:16px;overflow:hidden}
        .cf-glow::before{content:"";position:absolute;inset:-60%;background:conic-gradient(from 0deg,transparent 0 55%,var(--c) 75%,var(--g) 90%,transparent);animation:cfRot 3.2s linear infinite;opacity:.55;transition:opacity .3s}
        .cf-glow:focus-within::before{opacity:1;animation-duration:1.4s}
        .cf-glow:focus-within{box-shadow:0 0 40px rgba(34,227,255,.55),0 0 90px rgba(57,255,136,.18)}
        .cf-field{position:relative;display:flex;align-items:center;gap:10px;height:100%;padding:0 14px;border-radius:14px;background:#04141f}
        .cf-prompt{color:var(--g);font-family:Consolas,monospace;font-weight:700;direction:ltr}
        .cf-field input{flex:1;min-width:0;background:transparent;border:0;outline:0;color:#eaffff;font:600 1rem inherit;font-family:inherit;padding:16px 0;text-align:right}
        .cf-field input::placeholder{color:#5f8696}
        .cf-count{font:.7rem Consolas,monospace;color:#5f8696;direction:ltr}
        .cf-go{border:0;cursor:pointer;border-radius:16px;padding:0 26px;font:800 1rem inherit;font-family:inherit;color:#02121a;white-space:nowrap;
            background:linear-gradient(135deg,var(--c),var(--g));box-shadow:0 0 24px rgba(34,227,255,.5);transition:.2s}
        .cf-go:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 0 40px rgba(57,255,136,.6)}
        .cf-go:active{transform:scale(.97)}

        .cf-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:14px}
        .cf-chips button{background:rgba(34,227,255,.06);border:1px solid var(--ln);color:#bfeaf7;border-radius:999px;padding:6px 14px;cursor:pointer;font:600 .82rem inherit;font-family:inherit;transition:.2s}
        .cf-chips button:hover{background:rgba(34,227,255,.18);color:#fff;box-shadow:0 0 14px rgba(34,227,255,.4);transform:translateY(-2px)}

        .cf-status{display:flex;flex-wrap:wrap;gap:8px 22px;justify-content:center;margin-top:20px;padding-top:14px;border-top:1px dashed var(--ln);font:.75rem Consolas,monospace;color:#6f9aab;direction:ltr}
        .cf-pulse{display:inline-block;width:8px;height:8px;border-radius:50%;background:var(--g);margin-right:6px;box-shadow:0 0 0 0 rgba(57,255,136,.7);animation:cfPulse 1.6s infinite}
        @keyframes cfPulse{to{box-shadow:0 0 0 10px rgba(57,255,136,0)}}

        .cf-loading{position:absolute;inset:0;z-index:20;display:none;flex-direction:column;align-items:center;justify-content:center;gap:16px;background:rgba(2,8,13,.92);backdrop-filter:blur(4px)}
        .cf-loading.on{display:flex}
        .cf-ring2{width:74px;height:74px;border-radius:50%;border:3px solid transparent;border-top-color:var(--c);border-bottom-color:var(--g);animation:cfRot 1s linear infinite;box-shadow:0 0 30px rgba(34,227,255,.5)}
        .cf-loading pre{margin:0;min-height:5.2em;color:var(--g);font:.85rem/1.7 Consolas,monospace;direction:ltr;text-align:left}
        .cf-bar{width:min(320px,70%);height:6px;border-radius:9px;background:#0b2a3a;overflow:hidden}
        .cf-bar i{display:block;height:100%;width:0;background:linear-gradient(90deg,var(--c),var(--g));animation:cfBar 7s ease-out forwards}
        @keyframes cfBar{to{width:92%}}

        .cf-answer{margin-top:24px;border-radius:16px;border:1px solid rgba(57,255,136,.45);background:rgba(3,20,16,.78);box-shadow:0 0 36px rgba(57,255,136,.16);animation:cfIn .5s cubic-bezier(.2,.9,.3,1.2) both;overflow:hidden}
        @keyframes cfIn{from{opacity:0;transform:translateY(24px) scale(.98)}}
        .cf-ans-head{display:flex;justify-content:space-between;align-items:center;padding:10px 16px;background:rgba(57,255,136,.1);color:var(--g);font-weight:800}
        .cf-ans-body{padding:18px 20px;line-height:1.95;color:#e6fff0;font-weight:600;white-space:pre-wrap;min-height:60px}
        .cf-ans-body.typing::after{content:"▍";color:var(--g);animation:cfBlink .8s steps(1) infinite}
        .cf-ans-foot{padding:9px 16px;font-size:.78rem;color:#7fb79a;border-top:1px dashed rgba(57,255,136,.25)}
        .cf-error{margin-top:22px;padding:14px 16px;border-radius:12px;background:rgba(80,10,20,.6);border:1px solid #ff4d6a;color:#ffb3c0;font-weight:700}

        .cf-hack :focus-visible{outline:2px solid var(--g);outline-offset:2px}
        @media(max-width:720px){
            .cf-inner{padding:18px 14px 22px}.cf-cards{grid-template-columns:1fr;gap:12px}
            .cf-card{display:grid;grid-template-columns:90px 1fr;align-items:center;text-align:right;gap:0 10px}
            .cf-card .cf-svg{grid-row:1/3;max-width:90px}.cf-card h4,.cf-card p{align-self:center}
            .cf-form{flex-direction:column}.cf-go{padding:15px}.cf-cube{display:none}
        }
        @media(prefers-reduced-motion:reduce){.cf-hack *,.cf-hack *::before,.cf-hack *::after{animation:none!important;transition:none!important}}
   body.dark-mode .cf-hack .cf-go,
body.dark-mode .cf-hack .cf-m-send {
    background: linear-gradient(135deg, #2dffc4, #7fffe0) !important;
    color: #02121a !important;
    border: 0 !important;
    border-radius: 16px !important;
    box-shadow: 0 0 24px rgba(45, 255, 196, .5) !important;
    text-shadow: none !important;
}
body.dark-mode .cf-hack .cf-go:hover,
body.dark-mode .cf-hack .cf-m-send:hover {
    background: linear-gradient(135deg, #2dffc4, #7fffe0) !important;
    color: #02121a !important;
    box-shadow: 0 0 40px rgba(45, 255, 196, .75) !important;
}
body.dark-mode .cf-hack .cf-mini,
body.dark-mode .cf-hack .cf-chips button {
    background: rgba(45, 255, 196, .06) !important;
    color: #bfffee !important;
    border: 1px solid rgba(45, 255, 196, .28) !important;
    border-radius: 999px !important;
    box-shadow: none !important;
}
body.dark-mode .cf-hack .cf-field input,
body.dark-mode .cf-hack input {
    background: transparent !important;
    border: 0 !important;
    box-shadow: none !important;
}
   </style>

    <script>
    (function () {
        var root = document.getElementById('cfHack');
        if (!root) return;
        var TC = {
    copy:   @json(__('📋 نسخ')),
    copied: @json(__('✅ تم النسخ'))
};
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        /* 1) Matrix rain */
        var cv = document.getElementById('cfMatrix'), ctx = cv.getContext('2d'), drops = [], fs = 16, raf = null, matrixOn = !reduce;
        var chars = '01ABCDEF❄°C∆Ω#$%<>/\\'.split('');
        function size() {
            cv.width = root.clientWidth; cv.height = root.clientHeight;
            drops = new Array(Math.ceil(cv.width / fs)).fill(1).map(function () { return Math.random() * -50; });
        }
        function draw() {
            ctx.fillStyle = 'rgba(5,11,10,.12)'; ctx.fillRect(0, 0, cv.width, cv.height);
            ctx.font = fs + 'px monospace';
            for (var i = 0; i < drops.length; i++) {
               ctx.fillStyle = Math.random() > .96 ? '#fff' : '#2dffc4';
                ctx.fillText(chars[Math.floor(Math.random() * chars.length)], i * fs, drops[i] * fs);
                if (drops[i] * fs > cv.height && Math.random() > .975) drops[i] = 0;
                drops[i]++;
            }
            raf = setTimeout(function () { requestAnimationFrame(draw); }, 55);
        }
        size(); window.addEventListener('resize', size);
        if (matrixOn) draw(); else cv.style.display = 'none';
        document.getElementById('cfToggleMatrix').addEventListener('click', function () {
            matrixOn = !matrixOn;
            if (matrixOn) { cv.style.display = ''; draw(); } else { clearTimeout(raf); cv.style.display = 'none'; }
        });

        /* 2) Boot typing line */
        var boot = document.getElementById('cfBoot'), bt = 'diagnose --device=fridge --ai=on', bi = 0;
        (function type() { if (bi <= bt.length) { boot.textContent = bt.slice(0, bi++); setTimeout(type, reduce ? 0 : 55); } })();

        /* 3) 3D tilt cards */
        document.querySelectorAll('[data-tilt]').forEach(function (el) {
            el.addEventListener('mousemove', function (e) {
                var r = el.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - .5, y = (e.clientY - r.top) / r.height - .5;
                el.style.transform = 'rotateY(' + (x * 18) + 'deg) rotateX(' + (-y * 18) + 'deg) translateZ(8px)';
            });
            el.addEventListener('mouseleave', function () { el.style.transform = ''; });
        });

        /* 4) Mouse spotlight */
        var spot = document.getElementById('cfSpot');
        root.addEventListener('mousemove', function (e) {
            var r = root.getBoundingClientRect(); spot.style.opacity = 1;
            spot.style.left = (e.clientX - r.left) + 'px'; spot.style.top = (e.clientY - r.top) + 'px';
        });
        root.addEventListener('mouseleave', function () { spot.style.opacity = 0; });

        /* 5) Live temp, ping, clock */
        var temp = document.getElementById('cfTemp'),
        ping = document.getElementById('cfPing'),
        clock = document.getElementById('cfClock');

        setInterval(function () {
        temp.textContent = (-17 - Math.round(Math.random() * 20) / 10) + '°C';
        ping.textContent = 18 + Math.floor(Math.random() * 40);
        }, 1800);

        setInterval(function () {
        // التعديل هنا: استخدام 'en-US' وتفعيل hour12
        clock.textContent = new Date().toLocaleTimeString('en-US', { hour12: true });
        }, 1000);

        /* 6) Input: chips, counter, "/" shortcut, voice */
        var input = document.getElementById('faq-ai-input'), count = document.getElementById('cfCount');
        function upd() { count.textContent = input.value.length + '/500'; }
        input.addEventListener('input', upd); upd();
        document.getElementById('cfChips').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-q]'); if (!b) return;
            input.value = b.getAttribute('data-q'); upd(); input.focus();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === '/' && !/INPUT|TEXTAREA/.test(document.activeElement.tagName)) { e.preventDefault(); input.focus(); }
        });
        var SR = window.SpeechRecognition || window.webkitSpeechRecognition, mic = document.getElementById('cfMic');
        if (SR) {
            mic.hidden = false;
            mic.addEventListener('click', function () {
                var rec = new SR(); rec.lang = 'ar-PS'; mic.textContent = '🔴';
                rec.onresult = function (ev) { input.value = ev.results[0][0].transcript; upd(); };
                rec.onend = function () { mic.textContent = '🎤'; };
                rec.start();
            });
        }

        /* 7) Loading overlay on submit */
        var lines = ['> connecting to AI core...', '> scanning symptoms...', '> checking compressor / thermostat / seals...', '> generating repair plan...'];
        document.getElementById('cfForm').addEventListener('submit', function () {
            var box = document.getElementById('cfLoading'), log = document.getElementById('cfLog'), i = 0;
            box.classList.add('on'); log.textContent = '';
            setInterval(function () { if (i < lines.length) log.textContent += lines[i++] + '\n'; }, 900);
        });

        /* 8) Answer typing + copy */
        var body = document.getElementById('cfAnsBody');
        if (body) {
            var full = (body.getAttribute('data-text') || '').replace(/\*\*/g, '').replace(/^\s*[*#]+\s?/gm, ''), p = 0;
            if (reduce) { body.textContent = full; }
            else {
                body.classList.add('typing');
                (function t() {
                    body.textContent = full.slice(0, p); p += 2;
                    if (p <= full.length + 1) setTimeout(t, 18); else { body.textContent = full; body.classList.remove('typing'); }
                })();
            }
            var cp = document.getElementById('cfCopy');
            cp.addEventListener('click', function () {
                if (navigator.clipboard) navigator.clipboard.writeText(full);
cp.textContent = TC.copied; setTimeout(function () { cp.textContent = TC.copy; }, 1800);            });
            document.getElementById('cfAnswer').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    })();
    </script>
</section>
<!-- END COOLFIX HACKER AI FAQ -->

@endsection
