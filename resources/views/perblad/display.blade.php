@extends('perblad.layout')
@section('title', __('Request Received') . ' | COOLFIX')
@section('content')
    @php $d = session('client_data'); @endphp

    <style>
        .rcv{padding:60px 0 80px;background:#f4f9f8}
        .rcv-card{max-width:720px;margin:0 auto;background:#fff;border:1px solid #e2ecea;border-radius:24px;
            padding:40px 34px;box-shadow:0 20px 50px rgba(1,62,55,.12)}
        .rcv-ok{width:78px;height:78px;margin:0 auto 18px;border-radius:50%;display:grid;place-items:center;
            font-size:2.1rem;font-weight:900;color:#FEC961;background:linear-gradient(135deg,#013e37,#0a7a6b);
            box-shadow:0 0 0 8px rgba(1,62,55,.08)}
        .rcv h2{text-align:center;margin:0 0 8px;font-size:1.7rem;font-weight:700;color:#013e37}
        .rcv-sub{text-align:center;margin:0 0 22px;color:#5d756f}
        .rcv-ref{display:block;width:max-content;max-width:100%;margin:0 auto 26px;padding:8px 22px;border-radius:40px;
            background:#fff8e6;border:1px dashed #FEC961;color:#7a5a00;font-weight:700;direction:ltr;letter-spacing:.5px}
        .rcv-list{list-style:none;margin:0;padding:0;display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .rcv-list li{padding:14px 16px;border-radius:14px;background:#f0f7f5;border:1px solid #dcebe7}
        .rcv-list li.full{grid-column:1/-1}
        .rcv-list small{display:block;margin-bottom:4px;color:#0a7a6b;font-weight:700;font-size:.82rem}
        .rcv-list span{display:block;color:#274540;font-weight:600;word-break:break-word;overflow-wrap:anywhere}
        .rcv-empty{padding:16px;border-radius:12px;background:#fef3c7;color:#92400e;text-align:center;font-weight:600}
        .rcv-actions{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-top:28px}
        .rcv-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 28px;border-radius:50px;
            border:2px solid #013e37;background:#013e37;color:#fff;font-weight:600;text-decoration:none;transition:.25s}
        .rcv-btn:hover{background:#fff;color:#013e37}
        .rcv-btn.alt{background:#fff;color:#013e37}
        .rcv-btn.alt:hover{background:#013e37;color:#fff}

        body.dark-mode .rcv{background:#050b0a}
        body.dark-mode .rcv-card{background:#0a1716;border-color:rgba(45,255,196,.35);box-shadow:0 0 40px rgba(45,255,196,.12)}
        body.dark-mode .rcv-ok{background:#0b3b34;color:#2dffc4;box-shadow:0 0 24px rgba(45,255,196,.45)}
        body.dark-mode .rcv h2{color:#2dffc4;text-shadow:0 0 14px rgba(45,255,196,.45)}
        body.dark-mode .rcv-sub{color:#a6cbc3}
        body.dark-mode .rcv-ref{background:rgba(255,209,102,.08);border-color:#ffd166;color:#ffd166}
        body.dark-mode .rcv-list li{background:#0b1f1c;border-color:rgba(45,255,196,.25)}
        body.dark-mode .rcv-list small{color:#2dffc4}
        body.dark-mode .rcv-list span{color:#d6f6ee}
        body.dark-mode .rcv-empty{background:rgba(255,209,102,.1);color:#ffd166}
        body.dark-mode .rcv-btn{background:linear-gradient(135deg,#2dffc4,#7fffe0);border:0;color:#02121a;box-shadow:0 0 20px rgba(45,255,196,.4)}
        body.dark-mode .rcv-btn.alt{background:transparent;border:1px solid rgba(45,255,196,.5);color:#2dffc4;box-shadow:none}

        @media(max-width:600px){
            .rcv{padding:30px 0 50px}
            .rcv-card{margin:0 12px;padding:28px 18px;border-radius:20px}
            .rcv-list{grid-template-columns:1fr}
            .rcv-btn{width:100%;justify-content:center}
        }
    </style>

    <section class="rcv">
        <div class="container">
            <div class="rcv-card">
                @if ($d)
                    <div class="rcv-ok">✓</div>
                    <h2>{{ __('Thank you! Your request has been received.') }}</h2>
                    <p class="rcv-sub">{{ __('We will contact you by phone as soon as possible.') }}</p>

                    @if (!empty($d['ref']))
                        <span class="rcv-ref">{{ __('Request No.') }}: {{ $d['ref'] }}</span>
                    @endif

                    <ul class="rcv-list">
                        <li><small>{{ __('Name') }}</small><span>{{ $d['name'] ?? '-' }}</span></li>
                        <li><small>{{ __('Phone') }}</small><span dir="ltr" style="text-align:start">{{ $d['phone'] ?? '-' }}</span></li>
                        <li><small>{{ __('Fridge brand') }}</small><span>{{ $d['brand'] ?? '-' }}</span></li>
                        <li><small>{{ __('Area') }}</small><span>{{ $d['area'] ?? '-' }}</span></li>
                        <li class="full"><small>{{ __('Problem') }}</small><span>{{ $d['describe'] ?? '-' }}</span></li>
                    </ul>
                @else
                    <div class="rcv-empty">{{ __('No data available to display currently.') }}</div>
                @endif

                <div class="rcv-actions">
                    <a href="{{ route('contact') }}" class="rcv-btn alt">{{ __('Back') }}</a>
                    <a href="{{ url('/') }}" class="rcv-btn">{{ __('Home') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
