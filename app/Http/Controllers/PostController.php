<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 🎯 شرط الأمان الحديدي: لو الـ ID المراد حذفه هو نفس ID الأدمن الحالي، ارفض فوراً وبدون ريفريش فارغ 👇
        if ((int)$id === (int)auth()->id()) {
            return redirect()->back()->with('error', 'تنبيه أمان: لا يمكنك حذف حسابك الحالي الذي تدير منه لوحة التحكم الحين! ❌');
        }

        // 1. الاستعلام الصارم من جدول الـ users غصباً عن الكاش
        $user = \App\Models\User::findOrFail($id);

        // 2. أمر الإبادة الفوري والقطعي من قاعدة البيانات الـ MySQL 🚀
        $user->delete();

        // 3. العودة للخلف وتحديث الجدول تلقائياً بسلام
        return redirect()->back()->with('success', 'تم حذف الحساب بنجاح وتحديث لوحة التحكم!');
    }

public function data()
{
    abort_if(auth()->user()->type !== 'admin', 403, 'غير مصرح لك بدخول هذه الصفحة.');

    // جلب كافة المستخدمين والمسؤولين المسجلين في الـ MySQL 🚀
    $users = User::all();

        // 🛠️ التعديل الحاسم: توجيه المسار إلى مجلد perblad ليعثر اللارافيل على ملف الـ inform فوراً 👇🎯
        return view('perblad.inform', compact('users'));
    }

    /**
     * 🌟 دالة تبديل صلاحية العضو فوراً بين ADMIN و USER بضغطة زر واحدة (الدالة المضافة لحسم الخطأ) 🚀🎯
     */
    public function toggleRole($id)
    {
        // 1. شرط الأمان الحديدي: منع الأدمن الحالي من تغيير صلاحية نفسه لحماية الجلسة 🔒
        if ((int)$id === (int)auth()->id()) {
            return redirect()->back()->with('error', 'تنبيه أمان: لا يمكنك تغيير صلاحية حسابك الحالي الذي تدير منه الجلسة الحين! ❌');
        }

        // 2. الاستعلام المباشر عن الحساب بالـ ID بجدول الـ users
        $user = \App\Models\User::findOrFail($id);

        // 3. آلية القلب التلقائية (لو أدمن يصير يوزر والعكس صحيح) 👇🎯
        if ($user->type === 'admin') {
            $user->type = 'user';
            $message = 'تم إنزال رتبة المستخدم إلى USER بنجاح! 👤';
        } else {
            $user->type = 'admin';
            $message = 'تم ترفيع رتبة المستخدم إلى ADMIN بنجاح! 👑';
        }

        // 4. حفظ التعديل الجديد في قاعدة البيانات فوراً 🚀
        $user->save();

        // 5. العودة للخلف وتفجير الإشعار الطائر النيوني الفخم في أعلى اليمين
        return redirect()->back()->with('success', $message);
    }

    /**
     * دالة ترقية وإلغاء تميز الموظف فوراً بقرار من الرئيس محمد 👑🌟
     */
    public function toggleTop($id)
    {
        abort_if(auth()->user()->type !== 'admin', 403, 'غير مصرح لك.');

        // 1. جلب حساب الموظف من قاعدة البيانات
        $user = \App\Models\User::findOrFail($id);

        // 2. آلية التبديل (إذا كان مميزاً نلغي التميز، والعكس صحيح)
        if ($user->is_top) {
            $user->is_top = false;
            $statusMessage = 'تم إلغاء الترقية الملوكية للحساب وعاد كـ موظف عادي. 👤';
        } else {
            $user->is_top = true;
            $statusMessage = 'أمر سيادي: تم ترفيع وتعيين ' . $user->name . ' كـ فني مميز بنجاح! 🌟👑';
        }

        // 3. حفظ التعديل الجديد في جدول قاعدة البيانات فوراً 🚀
        $user->save();

        // 4. العودة للخلف وتفجير الإشعار الطائر النيوني الفخم في أعلى اليمين
        return redirect()->back()->with('success', $statusMessage);
    }

    public function impersonate($id)
    {
        // حماية أمنية: منع الأدمن من التقمص والتفتيش على نفسه 🔒
        if ((int)$id === (int)auth()->id()) {
            return redirect()->back()->with('error', 'أنت الرئيس بالفعل وجلسة تفتيشك نشطة الحين! ❌');
        }

        // 1. حفظ ID الرئيس الحالي (أنت) بداخل جلسة السيرفر المؤقتة لتأمين طريق العودة 👇🎯
        session(['impersonator_id' => auth()->id()]);

        // 2. الاستعلام عن حساب الموظف أو الفني المطلوب من قاعدة البيانات
        $user = \App\Models\User::findOrFail($id);

        // 3. الأمر الخارق: إجبار لارافيل 13 على تسجيل الدخول بهوية هاد العضو فوراً غصباً عن الكاش 🚀
        auth()->login($user);

        // 4. توجيهه فوراً للصفحة الرئيسية (الهوم) ليرى الريس الموقع بعيون الموظف الحين
        return redirect('/')->with('success', 'تم بدء جلسة التفتيش السري! تصفح الموقع الحين بهوية: ' . $user->name);
    }

    /**
     * دالة مغادرة حساب الموظف والعودة الفورية لكرسي الإدارة والرئيس محمد 👑🏁
     */
    public function leaveImpersonate()
    {
        // 1. فحص وأخذ الـ ID المخبأ للرئيس من الـ Session
        $originalAdminId = session('impersonator_id');

        if ($originalAdminId) {
            // 2. جلب حساب الرئيس محمد من قاعدة البيانات والتأكد من وجوده
            $admin = \App\Models\User::findOrFail($originalAdminId);

            // 3. إعادة تسجيل الدخول فوراً بحساب الرئيس الأصلي وإلغاء حساب الموظف 🚀
            auth()->login($admin);

            // 4. تصفير ومحو متغير التقمص من الـ Session لتنظيف الذاكرة
            session()->forget('impersonator_id');

            // 5. إعادة الرئيس لـ لوحة الحسابات والبيانات منوراً بسلام كامل
            return redirect()->route('posts.data')->with('success', 'تم إنهاء التفتيش بنجاح والعودة لكرسي الإدارة العريض! 👑🎉');
        }

        return redirect('/');
    }

    public function toggleBlock($id)
    {
        // 1. حماية أمنية: منع الأدمن الحالي من حظر نفسه لكي لا يقفل النظام عليه 🔒
        if ((int)$id === (int)auth()->id()) {
            return redirect()->back()->with('error', 'تنبيه أمان: لا يمكنك حظر حسابك الحالي الذي تدير منه الجلسة! ❌');
        }

        // 2. جلب المستخدم من قاعدة البيانات
        $user = \App\Models\User::findOrFail($id);

        // 3. آلية التبديل (إذا كان محظوراً نفك الحظر، والعكس صحيح)
        if ($user->is_blocked) {
            $user->is_blocked = false;
            $statusMessage = 'تم إلغاء الحظر وتفعيل حساب ' . $user->name . ' بنجاح! ✅';
        } else {
            $user->is_blocked = true;
            $statusMessage = 'تم حظر حساب ' . $user->name . ' ومنعه من دخول الموقع فوراً! 🚫';
        }

        // 4. حفظ التعديل في الـ Database
        $user->save();

        // 5. العودة للخلف وتفجير الإشعار الطائر الفخم اللي عملناه سوا
        return redirect()->back()->with('success', $statusMessage);
    }


    /**
     * دالة ربط صفحة الـ FAQ بذكاء جيميناي بعد تصحيح مسار الرابط بالكامل 🤖⚡
     */
    public function faqAISearch(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
        ]);

        $userQuestion = $request->input('question');

        $prompt = "أنت المساعد الذكي لشركة COOLFIX لخدمات التكييف والتبريد. "
            . "أجب بدقة وباختصار وبأسلوب فني محترف باللغة العربية وبدون مقدمات. "
            . "اكتب نصاً عادياً فقط بدون نجوم ** وبدون عناوين أو رموز تنسيق، وإن كان هناك خطوات فاكتب كل خطوة في سطر جديد. "
            . "سؤال العميل: " . $userQuestion;
        try {
            $apiKey = config('gemini.api_key');
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent';

            $response = \Illuminate\Support\Facades\Http::timeout(30)
                ->withHeaders([
                    'Content-Type'   => 'application/json',
                    'x-goog-api-key' => $apiKey,
                ])
                ->post($url, [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]],
                    ],
                ]);

            $result = $response->json();
            $aiAnswer = $result['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$aiAnswer) {
                \Log::warning('Gemini bad response', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return redirect()->back()->with('error', 'تعذّر الحصول على إجابة الآن، حاول مرة أخرى لاحقاً.');
            }

            return redirect()->back()->with([
                'ai_answer'     => $aiAnswer,
                'user_question' => $userQuestion,
            ]);
        } catch (\Throwable $e) {
            \Log::error('Gemini error: ' . $e->getMessage());
            session(['last_ai' => ['q' => $userQuestion, 'a' => $aiAnswer]]);
            return redirect()->back()->with('error', 'حدث خطأ، حاول مرة أخرى لاحقاً.');
        }
    }

}
