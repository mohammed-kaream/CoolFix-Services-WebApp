<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutTeam;
use App\Models\HomeCounter;
use App\Models\HomeFeature;
use App\Models\Pricing;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class CoolController extends Controller
{
    /**
     * دالة عرض صفحة من نحن (About)
     */
    public function about()
    {
        // 1. جلب الـ 4 عدادات الإحصائية النشطة من قاعدة البيانات
        $homeCounters = HomeCounter::where('is_active', true)->get();

        // 2. جلب الـ 6 ميزات التنافسية النشطة من قاعدة البيانات
        $homeFeatures = HomeFeature::where('is_active', true)->get();

        // 3. جلب كروت فريق العمل الثلاثة النشطة من قاعدة البيانات 🎯
        $aboutTeams = AboutTeam::where('is_active', true)->get();

        // 4. جلب كروت آراء العملاء الـ 10 النشطة من قاعدة البيانات
        $testimonials = Testimonial::where('is_active', true)->get();

        // 5. التعديل الحاسم: تمرير المتغيرات الأربعة معاً لصفحة الأباوت بسلام 🚀 👇
        return view('perblad.about', compact('homeCounters', 'homeFeatures', 'aboutTeams', 'testimonials'));
    }

    public function services()
    {
        // 1. جلب الخدمات النشطة من قاعدة البيانات
        $services = \App\Models\Service::where('is_active', true)->get();

        // 2. تمرير المتغير $services إلى ملف الـ Blade لكي يقرأه الـ foreach
        return view('perblad.services', compact('services'));
    }


    public function pricing()
    {
        // جلب الباقات مع ميزاتها المترابطة دفعة واحدة بذكاء وعال العال 🎯
        $pricings = Pricing::with('features')->where('is_active', true)->get();

        // التمرير الآمن داخل الـ compact بجانب المتغيرات السابقة
        return view('perblad.pricing', compact('pricings'));
        // (تأكد من إبقاء المتغيرات السابقة بجانبه مثل: compact('homeCounters', 'pricings'))
    }



    public function contact_data(Request $request)
    {
        // $data = $request->except('phone');
        // $data = $request->all();
        // dd($request->all());

        //----------1-------------
        $validatedData =  $request->validate([
            'name' => 'required|string|min:5',
            'phone' => 'required|string|min:9',
            'brand' => 'required|string',
            'area' => 'required|string',
            'textarea' => 'required|string',
        ]);
        return view('perblad.display', compact('validatedData'));
        //-----------2-------------
        // $rules = [
        //     'name' => 'required|string|min:5',
        //     'phone' => 'required|string|min:9',
        //     'brand' => 'required|string',
        //     'area' => 'required|string',
        //     'textarea' => 'required|string',
        // ];

        // $customMessages = [
        // 'required'   => 'هاد الحقل مطلوب !!!',
        // 'phone.min' =>" اقل اشي رقم الجوال تسع خانات"
        // ];


        $request->validate($rules, $customMessages);

        return "تم استقبال البيانات بنجاح!";
    }
    public function store(Request $request)
    {
        // $name = $request->input('name');

        // $image = $request->file('avatar');

        // $ip = $request->ip();
        // $url = $request->url();
        // $user = $request->userAgent();
        // dd($user);
        // 2. إنشاء نسخة من كلاس الـ Agent
        $agent = new Agent();
        $macAddress = "Unknown";
        $output = shell_exec('getmac');
        if ($output && preg_match('/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/', $output, $matches)) {
            $macAddress = $matches[0];
        }

        $data = [
            // --- 1. Device and System Info (From Agent Library) ---
            'device_type'          => $agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Desktop / Laptop'),
            'device_brand_model'   => $agent->device(),
            'operating_system'     => $agent->platform(),
            'os_version'           => $agent->version($agent->platform()),
            'browser'              => $agent->browser(),
            'browser_version'      => $agent->version($agent->browser()),

            // --- 2. Advanced Info (From Agent Library) ---
            'is_robot'             => $agent->isRobot() ? 'Yes (Robot)' : 'No (Human)',
            'robot_name'           => $agent->robot() ?: 'Not a Robot',
            'browser_languages'    => $agent->languages(), // Array of preferred languages e.g., [ar, en]

            // --- 3. Network and Request Info (From Request Object) ---
            'ip_address'           => $request->ip(), // Retrieves the visitor's IP address
            'current_url'          => $request->url(),
            'request_method'       => $request->method(), // GET, POST, etc.
            'ip devices'           => gethostbyname(gethostname()),

            // --- 4. MAC Address Info ---
            'mac_address'          => $macAddress, // هنا قمنا بإضافة النتيجة بنجاح

        ];



        // Dump and die to display the final comprehensive data
        // dump($data);
        dd($data);
    }



    // public function getDeviceDetails()
    // {
    //     $agent = new Agent();

    //     // 1. جلب الـ IP المحلي الحقيقي للابتوب
    //     $localIp = gethostbyname(gethostname());

    // 2. جلب الـ MAC Address للابتوب (يعمل محلياً على الويندوز)
    // $macAddress = "Unknown";
    // $output = shell_exec('getmac');
    // if ($output && preg_match('/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/', $output, $matches)) {
    //     $macAddress = $matches[0];
    // }

    //     // 3. ربط كل البيانات في مصفوفة واحدة
    //     $allData = [
    //         // البيانات الحقيقية للجهاز التي طلبتها
    //         "real_device_ip"     => $localIp,       // آي بي اللابتوب الحقيقي وليس 127.0.0.1
    //         "mac_address"        => $macAddress,    // الماك أدرس الخاص باللابتوب
    //     ];

    //     dd($allData);
    // }


    public function upload_file()
    {
        return view('perblad.upload');
    }

    public function storeFile(Request $request)
    {

        $file = $request->file('user_photo');

        $path = $file->store('avatars', 'public');
        return view('perblad.show', compact('path'));
        // return ('send' ." ". $path);
    }


    public function user()
    {
        return 'Welcome bake in the page user @-@ ';
    }
    public function post()
    {
        return 'Welcome bake in the page post @-@ ';
    }

public function loginAsGuest()
{
    // 1. تسجيل الخروج من أي حساب حقيقي سابق منعاً للتداخل
    auth()->logout();

    // 2. تفعيل جلسة الضيف الزائر في المتصفح فوراً
    session()->put('guest_auth', true);

    // 3. التوجيه الفوري لصفحة الموقع الرئيسية
    return redirect()->to('/');
}

    }
