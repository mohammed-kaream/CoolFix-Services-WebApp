@extends('perblad.layout')
@section('title', 'Services | COOLFIX Company')
@section('content')
    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center p-4">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h1>{{ __('Our Services') }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li> {{ __('/ Services') }}</li>
                    </ul>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!--START SERVICES -->
    <!-- 1. يجب إضافة كلاس الـ row هنا لكي تترتب الكروت بجانب بعضها -->
    <!-- 🎯 1. حقل البحث الفوري الفخم في أعلى قسم الخدمات -->
    <!-- 🎯 1. حقل البحث المودرن والفخم المحدث بالكامل -->
    <div class="row justify-content-center" style="margin-bottom: 50px; margin-top: 20px;">
        <div class="col-lg-6 col-md-8 col-sm-10 p-5">
            <div class="coolfix-search-wrapper"
                style="position: relative; display: flex; align-items: center; background: #ffffff; border: 2px solid #e5e7eb; border-radius: 50px; padding: 6px 8px 6px 25px; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);">

                <!-- حقل الإدخال النظيف -->
                <input type="text" id="service-search-input"
                    placeholder="{{ __('What cooling service do you need today?...') }}"
                    style="width: 100%; border: none; outline: none; font-size: 1rem; color: #374151; background: transparent; padding-right: 50px;">

                <!-- 🎯 الخطوة 1: استبدل ديف العدسة القديم بهذا الديف المحدث المجهز بالـ ID والـ cursor المباشر -->
                <div id="trigger-search-btn" class="search-icon-btn"
                    style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 35px; height: 35px; background: #15803d; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; box-shadow: 0 4px 10px rgba(21, 128, 61, 0.25); transition: all 0.3s ease; cursor: pointer;">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 1rem;"></i>
                </div>

            </div>
        </div>
    </div>

    <!-- حاوية الكروت الرئيسية (تبقي كما هي) -->
    <div class="row" id="services-wrapper">

        @foreach ($services as $service)
            <!-- كلاس service-card على الـ COL الأب الخارجي مجهز بتصفير حشو البوتستراب px-0 -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4 service-card px-0 home-stagger-item">

                <!-- 🛠️ التعديل الحاسم: أضفنا margin جانبي بمقدار 15px لإبعاد الكروت عن بعضها بشكل فخم ومنع الالتصاق 👇 -->
                <div class="course-item d-flex"
                    style="position: relative; width: calc(100% - 30px) !important; margin: 0 15px 25px 15px !important;">

                    <!-- تمديد الحاوية الداخلية لتملأ المربع بالكامل وتلتحم بالأطراف 100% -->
                    <div class="course-inner" style="width: 100% !important; margin: 0 !important;">

                        <div class="course-img">
                            <div class="course-img-icon">
                                <i class="fa-solid {{ $service->icon }} fa-3x"></i>
                            </div>
                            <div class="course-price">{{ __('From') }} ₪{{ $service->starting_price }}</div>
                        </div>
                        <div class="course-content">
                            <div class="ccategory">
                                <a href="#">{{ $service->category }}</a>
                            </div>
                            <h3><a href="#" class="service-name">{{ $service->name }}</a></h3>
                            <div class="crating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span>{{ __('5.0 / 98 Reviews') }}</span>
                            </div>
                            <div class="cmeta">
                                <span><i class="fa-solid fa-stopwatch"></i> {{ $service->duration }}</span>
                                <span class="cmtime"><i class="fa-solid fa-shield-halved"></i>
                                    {{ $service->warranty }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- الطبقة الشفافة للـ Hover الأصلي ممددة بالتطابق مع العرض الجديد -->
                    <div class="course-hover align-self-center"
                        style="width: 100% !important; height: 100% !important; left: 0 !important; top: 0 !important;">
                        <h3><a href="#">{{ $service->name }}</a></h3>
                        <p>{{ $service->description }}</p>
                        <a href="#">{{ __('Book This Service') }}</a>
                    </div>
                </div>
            </div><!--- END COL -->
        @endforeach

    </div>

    <!-- 🎯 2. كود الـ CSS التفاعلي للخانة الجديدة بقوة الـ !important لمنع قيود القالب -->
    <style>
        /* تأثير التوهج الفخم عند الضغط بداخل الخانة للتفاعل */
        .coolfix-search-wrapper:focus-within {
            border-color: #15803d !important;
            box-shadow: 0 10px 25px rgba(21, 128, 61, 0.12) !important;
            transform: translateY(-2px);
        }

        /* تأثير خفيف عند تمرير الماوس فوق الزر الأخضر */
        .coolfix-search-wrapper:hover .search-icon-btn {
            background: #166534 !important;
            scale: 1.05;
        }

        /* القيد الحديدي لإخفاء الكروت المستبعدة بالكامل مع الـ Hover */
        .service-card.hide-card {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }

        .service-card.hide-card .course-hover {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }
    </style>

    <!-- 🎯 3. سكربت الجافا سكريبت الصافي المطور (البحث بحسب بداية الأحرف المعتمد) -->
    <!-- 🎯 سكربت الفلترة الحية + ميزة النقر الفوري للعدسة غصباً عن الكاش -->
    <!-- 🎯 السكربت المكتمل والجاهز للنسخ المباشر بأسفل ملف الخدمات -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var searchInput = document.getElementById('service-search-input');

            // 1. هاد السطر اللي بتقصده بالظبط لمسك الزر الأخضر عبر الـ ID 🎯 👇
            var searchBtn = document.getElementById('trigger-search-btn');

            // 2. تفعيل حدث النقر لنقل مؤشر الكتابة إلى داخل الخانة فوراً
            if (searchBtn && searchInput) {
                searchBtn.addEventListener('click', function() {
                    searchInput.focus(); // نقل التركيز والمؤشر لداخل صندوق البحث
                });
            }

            // 3. كود الفلترة الحية بحسب بداية الكلمة (Starts With)
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    var value = this.value.toLowerCase().trim();
                    var cards = document.querySelectorAll('.service-card');

                    cards.forEach(function(card) {
                        var nameElement = card.querySelector('.service-name');
                        if (nameElement) {
                            var serviceName = nameElement.textContent.toLowerCase().trim();

                            // الفحص الصارم بحسب بداية الكلمة (Starts With %***)
                            if (serviceName.startsWith(value)) {
                                card.classList.remove('hide-card');
                            } else {
                                card.classList.add('hide-card');
                            }
                        }
                    });
                });
            }
        });
    </script>


    </div><!-- END COURSE LIST -->
    </div><!--- END CONTAINER -->
    </div>
    <!--END SERVICES -->

    <!-- START CTA BANNER -->
    <section class="marketing_content_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4>{{ __("Not Sure What's Wrong") }}</h4>
                <h1>{{ __("Describe the problem, we'll tell you what it needs.") }}</h1>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <p style="font-size:17px;margin-bottom:30px;">{!! __(
                        "Call or WhatsApp <strong>0598 924 040</strong> and describe the symptoms — noise, leaking, warm fridge, high bills. We'll tell you what it likely needs before we ever visit.",
                    ) !!}</p> <a href="tel:+970598924040"
                        class="cta"><span>{{ __('Call Us Now') }}</span>
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
