<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{


    public function showForm()
    {
        return view('perblad.contact');
    }


    // 1. دالة استقبال البيانات وترحيلها إلى قاعدة البيانات فوراً
    public function handleSubmit(Request $request)
    {
        // التحقق من الحقول الخمسة لجدولك
        $validated = $request->validate([
            'name'     => 'required|string|max:30',
            'phone'    => 'required|string|min:9|max:20',
            'brand'    => 'required|string|max:100',
            'area'     => 'required|string|max:150',
            'describe' => 'required|string',
        ]);

        // ترحيل البيانات الفعلي وحفظها داخل الـ DB (شغلك في الباك)
        ContactMessage::create($validated);

        // التوجيه إلى مسار صفحة النجاح مع تمرير البيانات في الـ Session
        // return redirect()->route('contact.display')->with('client_data', $validated);
        session(['client_data' => $validated]);
return redirect()->route('contact.display');
    }

    // 2. دالة عرض صفحة النجاح المطابقة لصورتك تماماً
    public function showDisplay()
    {
        // 1. تأمين بيانات العميل حتى لو دخلت على الرابط مباشرة بدون إرسال فورم
        $clientData = session('client_data', [
            'name' => 'Guest',
            'phone' => '0590000000',
            'brand' => 'Unknown',
            'area' => 'Gaza',
            'describe' => 'No description'
        ]);

        // 2. تمرير مصفوفة فارغة صريحة لمنع خطأ count() القاتل في السطر 32
        // return view('perblad.display')
        //     ->with('client_data', $clientData)
        //     ->with('aboutFaqs', []); // المصفوفة الفارغة تحمي السطر 32 فوراً
        return view('perblad.display')->with('aboutFaqs', []);

        }
    public function bookFromFaq(Request $request)
    {
        // honeypot: البوتات بتعبّي الحقل المخفي
        if ($request->filled('website')) {
            return response()->json(['ok' => true, 'ref' => 'CF-00000']);
        }

        $data = $request->validate([
            'name'     => 'required|string|max:30',
            'phone'    => 'required|string|min:9|max:20',
            'brand'    => 'required|string|max:100',
            'area'     => 'required|string|max:150',
            'describe' => 'nullable|string|max:1000',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'max'      => 'النص أطول من المسموح',
            'min'      => 'القيمة قصيرة جداً',
        ]);

        // التشخيص بنقرأه من الـ session مش من المتصفح، فما حدا بيقدر يزوّره
        $ai = session('last_ai');

        $message = ContactMessage::create($data + [
            'ai_diagnosis' => isset($ai['a']) ? \Illuminate\Support\Str::limit($ai['a'], 4000, '') : null,
            'source'       => 'faq_ai',
        ]);

        $ref = 'CF-' . str_pad((string) $message->id, 5, '0', STR_PAD_LEFT);

        // نفس البيانات اللي بتعرضها صفحة الشكر، تنحفظ للطلب الجاي (التحويل)
        // session(['client_data' => $data + ['ref' => $ref]]);
        session(['client_data' => $data + ['ref' => $ref]]);
        return response()->json([
            'ok'       => true,
            'ref'      => $ref,
            'redirect' => route('contact.display'),
        ]);
    }
}
