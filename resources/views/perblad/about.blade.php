@extends('perblad.layout')
@section('content')
@section('title', 'About Us | COOLFIX Company')
    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h1>{{ __("About Us") }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ __("Home") }}</a></li>
                        <li> {{ __("/ About") }}</li>
                    </ul>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!-- START ABOUT US HOME ONE -->
    <section class="ab_one section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="ab_content">
                        <h2>{{ __("A family workshop, built on trust.") }}</h2>
                        <p>{{ __("COOLFIX started as a one-man repair cart on Omar Al-Mukhtar Street and grew into a full refrigeration workshop, without ever losing the habit of treating every customer's kitchen like our own.") }}</p>
                    </div>
                    <div class="abmv">
                        <img src="{{ asset('webfront/images/all-img/light.svg') }}" alt="" />
                        <h4>{{ __("Straight answers, every visit") }}</h4>
                        <p>{{ __("We inspect first, explain second, and only start repairs once you've agreed to the price.") }}</p>
                    </div>
                    <div class="abmv">
                        <img src="{{ asset('webfront/images/all-img/target.svg') }}" alt="" />
                        <h4>{{ __("Built for Gaza's power realities") }}</h4>
                        <p>{{ __("Our technicians are experienced with the extra strain that power outages put on cooling systems, and we fix accordingly.") }}</p>
                    </div>
                    <div class="cta_two">
                        <a href="contact.html" class="cta"><span>{{ __("Get In Touch") }}</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="ab_img">
                        <img src="{{ asset('webfront/images/brand/about-illustration.svg') }}" class="img-fluid"
                            alt="Technician servicing a refrigerator">
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US HOME ONE -->

    <!-- START WHY CHOOSE US-->
    <section class="marketing_content_area section-padding">
        <div class="container">
            <div class="section-title">
                <h4>{{ __("Why Choose COOLFIX") }}</h4>
                <h1>{{ __("What sets our workshop apart.") }}</h1>
            </div>
            <div class="row">

                @foreach ($homeFeatures as $index => $feature)
                    <!-- جعلنا الـ delay ديناميكي يزيد تلقائياً مع كل كرت بناءً على الترتيب ليبقى الـ WOW مؤثر وجذاب -->
                    <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp " data-wow-duration="1s"
                        data-wow-delay="0.{{ $index + 1 }}s" data-wow-offset="0">
                        <div class="single_feature_one home-stagger-item">
                            <div class="sf_top">
                                <!-- الأيقونة الديناميكية -->
                                <i class="fa-solid {{ $feature->icon }}"></i>

                                <!-- العنوان الرئيسي للميزة -->
                                <!-- التعديل لفتح صفحة التواصل بسلام 👇 -->
                                <h2><a href="{{ route('about') }}">{{ $feature->title }}</a></h2>
                            </div>
                            <!-- نص الشرح والوصف التفصيلي القادم من الـ DB -->
                            <p>{{ $feature->description }}</p>

                            <a href="{{ route('about') }}">{{ __("Read More") }} <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div><!-- END COL -->
                @endforeach

            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END WHY CHOOSE US -->

    <!-- START COUNTER -->
    <section class="count_area counter_feature">
        <div class="container">
            <div class="row">

                @foreach ($homeCounters as $counter)
                    <div class="col-lg-3 col-sm-6 col-xs-12 mb-4 home-stagger-item">
                        <!-- استخدام نفس الألوان الزاهية الأصلية وقيم التنسيق المتجاوبة ديناميكياً -->
                        <div class="single-counter"
                            style="background-color: {{ $counter->bg_color }}; border-radius: 8px; padding: 30px 20px;">

                            <!-- الأيقونة الديناميكية المتوافقة مع الفونت أوسم -->
                            <span class="fa-solid {{ $counter->icon }} fa-2x mb-3" style="display: block;"></span>

                            <!-- الرقم الكبير الصافي الجاهز للعد التصاعدي التلقائي بالموقع -->
                            <h2 class="counter-num" style="font-weight: 700; margin-bottom: 5px;">
                                {{ $counter->count_value }}</h2>

                            <!-- النص التوضيحي المكتوب في قاعدة البيانات -->
                            <p class="mb-0" style="font-size: 0.95rem; color: #4b5563;">{{ $counter->title }}</p>

                        </div>
                    </div><!-- END COL -->
                @endforeach

            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END COUNTER -->

    <!-- START TEAM (owner/technician) -->
<!-- START TEAM SECTION -->
<!-- START TEAM SECTION -->
<section class="team_member section-padding" style="position: relative !important; display: block !important; padding: 80px 0 !important; overflow: visible !important;">
    <div class="container">
        <div class="section-title text-center" style="margin-bottom: 50px !important;">
            <h4>{{ __("Meet The Technician") }}</h4>
            <h1 style="font-weight: 700; color: #1f2937;">{{ __("The person who'll be at your door") }}</h1>
        </div>
        <div class="row" style="overflow: visible !important;">
            <div class="col-lg-12" style="position: relative !important; padding: 0 15px !important; overflow: visible !important;">

                <!-- حاوية السلايدر الرسمية للفريق مع كلاس owl-theme القياسي ومنع أي قص برمي -->
                <div id="team-slider" class="owl-carousel owl-theme" style="display: block !important; overflow: visible !important;">

                    @foreach ($aboutTeams as $member)
                        <div class="item home-stagger-item" style="overflow: visible !important; height: auto !important; ">
                            <!-- الكرت الطويل الفخم الممدد لـ 600px ليعطي راحة للعين -->
                            <div class="our-team" style="margin: 20px 7px !important;  box-shadow: 0 8px 25px rgba(0,0,0,0.06) !important; border-radius: 12px !important; padding-bottom: 40px !important; height: auto !important; min-height: 600px !important; display: block !important; overflow: visible !important; border: 1px solid #f3f4f6 !important;">

                                <!-- ارتفاع الصورة الأقصى ممدد لـ 420px لتظهر صور الفنيين ضخمة وفخمة -->
                                <div class="team_img" style="position: relative !important; overflow: hidden !important; height: auto !important; max-height: 520px !important; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                    <!-- صورة الفني ديناميكية -->
                                    <img src="{{ asset('webfront/images/team/' . $member->image) }}" alt="{{ $member->name }}" style="width: 100% !important; display: block !important; height: auto !important; object-fit: cover !important;">

                                    <!-- أزرار الجوال والواتساب الأصلية الثابتة في الزوايا الفخمة فوق الصورة -->
                                    <ul class="social" style="position: absolute !important; top: auto !important; bottom: 15px !important; left: 15px !important; right: 15px !important; padding: 0 !important; margin: 0 !important; list-style: none !important; display: flex !important; justify-content: space-between !important; width: calc(100% - 30px) !important; z-index: 99 !important;">
                                        <!-- زر الجوال تحت شمال 📞 -->
                                        <li style="margin:0 !important; float:none !important; display: inline-block !important;">
                                            <a href="tel:{{ $member->phone }}" class="top_f_facebook" style="width: 40px !important; height: 40px !important; line-height: 40px !important; background: #fff !important; color: #15803d !important; display: inline-block !important; text-align: center !important; border-radius: 50% !important; box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important; padding:0 !important;">
                                                <i class="fa-solid fa-phone" style="font-size: 0.95rem;"></i>
                                            </a>
                                        </li>
                                        <!-- زر الواتساب تحت يمين 💬 -->
                                        <li style="margin:0 !important; float:none !important; display: inline-block !important;">
                                            <a href="{{ $member->whatsapp }}" class="top_f_twitter" target="_blank" style="width: 40px !important; height: 40px !important; line-height: 40px !important; background: #fff !important; color: #25d366 !important; display: inline-block !important; text-align: center !important; border-radius: 50% !important; box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important; padding:0 !important;">
                                                <i class="fa-brands fa-whatsapp" style="font-size: 1.05rem;"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="team-content text-center" style="padding-top: 25px !important; display: block !important; height: auto !important;">
                                    <!-- 🛠️ التعديل الحاسم: ضفنا margin-bottom و padding-bottom لإبعاد الاسم عن خط الزينة والنقطة الخضراء تماماً كما طلبت 👇 -->
                                    <h3 class="title" style="font-size: 1.25rem !important; font-weight:700 !important;  margin-bottom: 15px !important; padding-bottom: 8px !important; display: block !important;">{{ $member->name }}</h3>

                                    <!-- المسمى الوظيفي الأخضر الموحد -->
                                    <span class="post" style="color: #15803d !important; font-size: 0.92rem !important; display:block !important; margin-bottom: 18px !important; font-weight: 600 !important; text-transform: uppercase;">{{ $member->role }}</span>

                                    <!-- تفاصيل الخبرة والتصليحات متباعدة وبشكل مريح فخم بقاعدة الكرت الممدد -->
                                    <div class="sth_det2" style="display: flex !important; justify-content: space-around !important; border-top: 1px solid #f1f5f9 !important; padding-top: 15px !important; font-size: 0.88rem !important; color: #4b5563 !important; width: 100% !important; margin-top: 15px !important;">
                                        <span class="ti-timer" style="display: inline-block !important;"> <i class="fa-solid fa-clock" style="color: #15803d !important; margin-right: 3px;"></i> <u>{{ $member->experience }}</u></span>
                                        <span class="ti-user" style="display: inline-block !important;"> <i class="fa-solid fa-user" style="color: #15803d !important; margin-right: 3px;"></i> <u>{{ $member->repairs_count }}</u></span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END ITEM -->
                    @endforeach

                </div>

            </div><!--- END COL -->
        </div><!-- END ROW -->
    </div><!-- END CONTAINER -->
</section>
<!-- END TEAM SECTION -->

<!-- 🎨 كود الـ CSS القاضي لإلغاء الأسهم تماماً وإجبار وإبراز تلوين نقاط السكرول (الداشات الخضراء) بقوة الـ !important -->
<style>
/* مسح وإلغاء حاوية الأسهم الجانبية نهائياً لمنع أي تضارب بصري ❌ */
#team-slider .owl-nav {
    display: none !important;
}

/* إجبار تلوين وتكحيل نقاط السكرول (الداشات الخضراء) بالأسفل بقوة الـ !important لتظهر واضحة تحت الصور 👇 */
#team-slider .owl-dots,
#team-slider .owl-dots.disabled {
    text-align: center !important;
    margin-top: 40px !important;
    display: block !important; /* إلغاء وإحباط أي وسم حظر إخفاء موروث من الـ layout الأب 🎯 */
    visibility: visible !important;
    opacity: 1 !important;
}
#team-slider .owl-dots .owl-dot {
    display: inline-block !important;
}
#team-slider .owl-dots .owl-dot span {
    width: 10px !important;
    height: 10px !important;
    margin: 5px 8px !important;
    background: #e5e7eb !important; /* لون الداشات الرمادي الهادئ غير النشط */
    display: block !important;
    border-radius: 30px !important;
    transition: all .2s ease !important;
}
#team-slider .owl-dots .owl-dot.active span {
    background: #15803d !important; /* لون الداشة الخضراء النشطة المعبرة عن هوية الموقع */
    width: 32px !important; /* تحويل النقطة النشطة لداشة مستطيلة فخمة تدل على التمرير السلس */
}
</style>

<!-- سكربت تفعيل التجاوب وحساب الـ نقاط تلقائياً بناءً على كروتك الـ 8 بسلام وبدون أخطاء -->
<script>
$(document).ready(function(){
    var teamSlider = $("#team-slider");

    if(teamSlider.hasClass('owl-loaded')){
        teamSlider.owlCarousel('destroy');
    }

    teamSlider.owlCarousel({
        items: 3,               // عرض 3 فنيين بجانب بعضهم في شاشات الـ Desktop كصورتك
        loop: true,             // تفعيل الـ loop كسر قيد حظر الـ disabled وجعل النقاط تظهر وتلف تلقائياً 🎯
        margin: 15,
        autoplay: true,         // تفعيل السكرول واللف التلقائي لتتحرك الصور أمام العميل لوحدها الفخامة
        autoplayTimeout: 4000,  // لفة كل 4 ثوانٍ
        smartSpeed: 800,
        nav: false,             // إلغاء الأسهم نهائياً بناءً على طلبك ❌
        dots: true,             // تفعيل وإظهار نقاط السكرول السفلية تلقائياً 🟢
        responsive:{
            0:{ items:1 },
            768:{ items:2 },
            1170:{ items:3 }
        }
    });
});
</script>
    <!-- END TEAM -->

    <!-- START CTA BANNER -->
    <section class="marketing_content_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4>{{ __("Have Questions") }}</h4>
                <h1>{{ __("See our full FAQ or just give us a call.") }}</h1>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <a href="faq.html" class="cta"><span>{{ __("Visit FAQ Page") }}</span>
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
