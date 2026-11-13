<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutFaq;
use App\Models\HomeCounter;
use App\Models\HomeFeature;
use App\Models\HomeService;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * دالة الصفحة الرئيسية الشاملة للموقع
     * تقوم بجلب وتمرير كافة الأقسام الديناميكية الأربعة معاً
     */
    public function home()
    {
        // 1. جلب الكروت الثمانية النشطة لخدمات التبريد من قاعدة البيانات
        $homeServices = HomeService::where('is_active', true)->get();

        // 2. جلب كروت آراء العملاء الـ 10 النشطة من قاعدة البيانات
        $testimonials = Testimonial::where('is_active', true)->get();

        // 3. جلب كروت العدادات الأربعة النشطة من قاعدة البيانات
        $homeCounters = HomeCounter::where('is_active', true)->get();

        // 4. جلب كروت الميزات الستة النشطة من قاعدة البيانات
        $homeFeatures = HomeFeature::where('is_active', true)->get();

        // 5. تمرير كافة المتغيرات الأربعة لملف الـ index المشترك بنجاح كامل 🚀
        return view('perblad.index', compact('homeServices', 'testimonials', 'homeCounters', 'homeFeatures'));
    }

    /**
     * دالة صفحة الأسئلة الشائعة الفردية
     */
    public function faq()
    {
        // جلب كافة الأسئلة الشائعة النشطة من جدول الـ MySQL
        $aboutFaqs = AboutFaq::where('is_active', true)->get();

        // تمرير المتغير لصفحة الـ faq بسلام وأمان
        return view('perblad.faq', compact('aboutFaqs'));
    }
}
