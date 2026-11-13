@extends('perblad.layout')
@section('title', 'Home | COOLFIX Company')
@section('content')
    <!-- START HOME -->
    <section id="home" class="home_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="home_content">
                        <h1>{{ __('Your fridge stops. We show up fast.') }}</h1>
                        <p>{{ __('COOLFIX repairs and maintains refrigerators, freezers and cooling systems across Gaza — honest diagnostics, genuine parts, and a technician who actually picks up the phone.') }}
                        </p>
                    </div>
                    <div class="home_btn">
                        <a href="tel:+970598924040" class="cta"><span>{{ __('Call 059 892 4040') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="home_me_img">
                        <img src="{{ asset('webfront/images/brand/hero-illustration.svg') }}" class="img-fluid"
                            alt="Refrigeration technician repairing a fridge" />
                        <div class="home_ps">
                            <img src="{{ asset('webfront/images/icon/user2.svg') }}" alt="" />
                            <h2>1200+</h2>
                            <span>{{ __('Happy customers') }}</span>
                        </div>
                        <div class="home_ps2">
                            <img src="{{ asset('webfront/images/icon/file2.svg') }}" alt="" />
                            <h2>3000+</h2>
                            <span>{{ __('Repairs completed') }}</span>
                        </div>
                    </div>
                </div><!-- END COL-->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->
    </div>
    <!-- END  TOP HEADER CLASS -->

    <!-- START COUNTER -->
    <section class="count_area counter_feature">
        <div class="container">
            <div class="row">

                @foreach ($homeCounters as $counter)
                    <div class="col-lg-3 col-sm-6 col-xs-12 mb-4 home-stagger-item">
                        <!-- جعلنا لون خلفية المربع ديناميكي يقرأ من الـ DB ليعيد ألوان صورتك الأصلية الزاهية -->
                        <div class="single-counter"
                            style="background-color: {{ $counter->bg_color }}; border-radius: 8px; padding: 30px 20px;">

                            <!-- الأيقونة الديناميكية (استخدمنا كلاسات الفونت أوسم لتدعم رموزك) -->
                            <span class="fa-solid {{ $counter->icon }} fa-2x mb-3" style="display: block;"></span>

                            <!-- الرقم الإحصائي الكبير ديناميكي -->
                            <h2 class="counter-num" style="font-weight: 700; margin-bottom: 5px;">
                                {{ $counter->count_value }}</h2>

                            <!-- النص التعريفي الصغير السفلي ديناميكي -->
                            <p class="mb-0" style="font-size: 0.95rem; color: #4b5563;">{{ $counter->title }}</p>

                        </div>
                    </div><!-- END COL -->
                @endforeach

            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END COUNTER -->

    <!-- START ABOUT US HOME ONE -->
    <section class="ab_one section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="ab_img">
                        <img src="{{ asset('webfront/images/brand/about-illustration.svg') }}" class="img-fluid"
                            alt="Technician inspecting a refrigerator">
                        <div class="wc_year">
                            <h3><span>9+</span> <br />{{ __('Years Experience') }}</h3>
                        </div>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="ab_content">
                        <h2>{{ __('Local, licensed, and always reachable.') }}</h2>
                        <p>{{ __('COOLFIX is a Gaza-based refrigeration workshop run by Mohammed Kareem Kohail. We diagnose the real problem before we touch a screwdriver, and we explain the fix in plain language before we start.') }}
                        </p>
                    </div>
                    <div class="abmv">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <h4>{{ __('Fast, honest diagnostics') }}</h4>
                        <p>{{ __("No guessing games — we tell you exactly what's wrong and what it costs before any work begins.") }}
                        </p>
                    </div>
                    <div class="abmv">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h4>{{ __('Warranty on every repair') }}</h4>
                        <p>{{ __('Every job leaves our workshop backed by a written warranty on parts and labor.') }}</p>
                    </div>
                    <div class="cta_two">
                        <a href="about.html" class="cta"><span>{{ __('More About Us') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US HOME ONE -->

    <!-- START TOP PROMO FEATURES -->
    <section class="tp_feature section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4>{{ __('Why Book With Us') }}</h4>
                <h1>{{ __('Refrigeration you can rely on.') }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                    <div class="single_tp">
                        <h3>{{ __('Same-Day Service') }}</h3>
                        <i class="fa-solid fa-truck-fast"></i>
                        <p>{{ __("Call before 3pm and in most cases we're at your door the same day.") }}</p>
                        <a href="{{ route('services') }}" class="cta"><span>{{ __('Learn More') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                    <div class="single_tp st_one">
                        <h3>{{ __('Certified Technicians') }}</h3>
                        <i class="fa-solid fa-user-gear"></i>
                        <p>{{ __('Trained on all major fridge and freezer brands sold in Gaza.') }}</p>
                        <a href="{{ route('about') }}" class="cta"><span>{{ __('Learn More') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                    <div class="single_tp st_two">
                        <h3>{{ __('Genuine Spare Parts') }}</h3>
                        <i class="fa-solid fa-gears"></i>
                        <p>{{ __('We only fit original or manufacturer-approved compressors and parts.') }}</p>
                        <a href="{{ route('services') }}" class="cta"><span>{{ __('Learn More') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 home-stagger-item">
                    <div class="single_tp st_three">
                        <h3>{{ __('Upfront Pricing') }}</h3>
                        <i class="fa-solid fa-tag"></i>
                        <p>{{ __('A clear quote before we start — no surprise charges on the invoice.') }}</p>
                        <a href="{{ route('pricing') }}" class="cta"><span>{{ __('Learn More') }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END TOP PROMO FEATURES -->

    <!-- START SERVICES GRID-->
    <section class="topic_content_p2 section-padding">
        <div class="container">
            <div class="section-title">
                <h4>{{ __('What We Fix') }}</h4>
                <h1>{{ __('Our Refrigeration Services') }}</h1>
            </div>
            <div class="row">
                @foreach ($homeServices as $card)
                    <div class="col-lg-3 col-sm-6 col-xs-12 mb-4 home-stagger-item">
                        <!-- جعلنا لون الخلفية ديناميكي يتغير حسب اللون المخزن في قاعدة البيانات لكل كرت -->
                        <div class="single_tca" style="background-color: {{ $card->bg_color }};">

                            <!-- الأيقونة الديناميكية -->
                            <i class="fa-solid {{ $card->icon }} fa-2x"></i>

                            <!-- العنوان الرئيسي للخدمة -->
                            <h2><a href="#">{{ $card->title }}</a></h2>

                            <!-- النص الصغير (البيضاوي أو التوضيحي السفلي) -->
                            <span>{{ $card->sub_text }}</span>

                        </div>
                    </div>
                @endforeach

            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END SERVICES GRID -->

    <!-- START TESTIMONIALS-->
    <section class="testi_home_area section-padding">
        <div class="container">
            <div class="section-title">
                <h4>{{ __('Testimonials') }}</h4>
                <h1>{{ __('What our customers say') }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- حاوية السلايدر المشغلة بمكتبة owl-carousel -->
                    <div id="testimonial-slider" class="owl-carousel">

                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial">
                                <div class="testi_pic_title">
                                    <div class="pic">
                                        <!-- صورة العميل الديناميكية: إذا توفرت في القاعدة تُعرض، وإلا يتم استخدام الأفتار الافتراضي t1.png -->
                                        <img src="{{ $testimonial->avatar ? asset('webfront/images/all-img/' . $testimonial->avatar) : asset('webfront/images/all-img/t1.png') }}"
                                            alt="{{ $testimonial->name }}">
                                    </div>
                                    <!-- اسم العميل ديناميكي -->
                                    <h4>{{ $testimonial->name }}</h4>
                                    <!-- المنطقة/العنوان ديناميكي -->
                                    <small class="post">{{ $testimonial->location }}</small>
                                </div>
                                <!-- نص الرسالة والتقييم ديناميكي -->
                                <p>{{ $testimonial->feedback }}</p>

                                <!-- توليد النجوم الذهبية ديناميكيًا بناءً على التقييم الرقمي المخزن في الـ DB للزبون -->
                                @for ($i = 0; $i < $testimonial->stars; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div><!-- END TESTIMONIAL -->
                        @endforeach

                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END TESTIMONIALS -->

    <!-- START CTA BANNER -->
    <section class="marketing_content_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4>{{ __('Need Help Today') }}</h4>
                <h1>{{ __("Fridge acting up? Don't let it spoil your food.") }}</h1>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <p style="font-size:17px;margin-bottom:30px;">{!! __(
                        "Call or WhatsApp us now at <strong>059 892 4040</strong> and we'll get a technician on the way. Based at the end of Omar Al-Mukhtar Street, Gaza — serving the whole city.",
                    ) !!}</p>
                    <a href="tel:+970598924040" class="cta"><span>{{ __('Call 059 892 4040') }}</span>
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END CTA BANNER -->


@endsection
