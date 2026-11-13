<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CoolController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

// =========================================================================
// 1. المسارات العامة (مفتوحة للزوار والضيوف بشكل طبيعي)
// =========================================================================

Route::get('/index', [CoolController::class, 'home'])->name('index');
Route::get('/about', [CoolController::class, 'about'])->name('about');
Route::get('/services', [CoolController::class, 'services'])->name('services');
Route::get('/pricing', [CoolController::class, 'pricing'])->name('pricing');
Route::get('/faq', [MainPageController::class, 'faq'])->name('faq');

Route::get('/data', [CoolController::class, 'store'])->name('store');
Route::get('/upload-file', [CoolController::class, 'upload_file'])->name('upload-file');
Route::post('/upload-file', [CoolController::class, 'storeFile']);

// مسارات التواصل وإرسال الحقول
Route::get('/contact', [ContactMessageController::class, 'showForm'])->name('contact');
Route::post('/contact/submit', [ContactMessageController::class, 'handleSubmit'])->name('contact.submit');
Route::get('/contact/display', [ContactMessageController::class, 'showDisplay'])->name('contact.display');

Route::post('/faq/book', [ContactMessageController::class, 'bookFromFaq'])
    ->middleware('throttle:5,1')
    ->name('faq.book');

Route::post('/faq/ai-search', [PostController::class, 'faqAISearch'])
    ->middleware('throttle:10,1')
    ->name('faq.ai_search');

// بوابة فحص الأدمن الاحتياطية
Gate::define('admin-only', function ($user) {
    return $user->type === 'admin';
});

// =========================================================================
// 2. مسارات لوحة التحكم والإدارة (محمية بـ auth ونفحص الصلاحية داخل الكنترولر غصباً عن الكاش)
// =========================================================================
Route::middleware(['auth'])->group(function () {
    // عرض جدول الحسابات وحذف الحسابات الأساسي
    Route::get('posts/inform', [PostController::class, 'data'])->name('posts.data');
    Route::delete('posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // أزرار العمليات والتعديل داخل اللوحة
    Route::get('/admin/force-delete-user/{id}', [PostController::class, 'destroy'])->name('admin.user.force_delete');
    Route::get('/admin/toggle-user-role/{id}', [PostController::class, 'toggleRole'])->name('admin.user.toggle_role');
    Route::get('/admin/toggle-block-user/{id}', [PostController::class, 'toggleBlock'])->name('admin.user.toggle_block');
    Route::get('/admin/toggle-top-user/{id}', [PostController::class, 'toggleTop'])->name('admin.user.toggle_top');
    Route::get('/admin/impersonate-user/{id}', [PostController::class, 'impersonate'])->name('admin.user.impersonate');
    Route::get('/admin/leave-impersonation', [PostController::class, 'leaveImpersonate'])->name('admin.user.leave_impersonate');
});

// =========================================================================
// 3. مسارات حزمة المصادقة (Laravel Breeze)
// =========================================================================
require __DIR__ . '/auth.php';

// =========================================================================
// 4. مسار الصفحة الرئيسية المشترك (يفحص الضيف ليعبر الحماية بسلام)
// =========================================================================
Route::get('/', function () {
    if (session()->has('guest_auth')) {
        return app(MainPageController::class)->home();
    }

    if (auth()->check()) {
        return app(MainPageController::class)->home();
    }

    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    if (session()->has('guest_auth')) {
        return app(MainPageController::class)->home();
    }
    return app(MainPageController::class)->home();
})->middleware(['auth', 'verified'])->name('dashboard');

// =========================================================================
// 5. جدار الحماية للحسابات المسجلة والملفات الشخصية فقط
// =========================================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'ar']), 404);
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

// مسار الدخول كضيف الزائر المستقل
Route::get('/login/guest', [\App\Http\Controllers\CoolController::class, 'loginAsGuest'])->name('login.guest');

// =========================================================================
// 6. Health check endpoint (used by Docker HEALTHCHECK and CI)
// =========================================================================
Route::get('/health', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        $database = 'ok';
    } catch (\Throwable $e) {
        $database = 'unavailable';
    }

    $healthy = $database === 'ok';

    return response()->json([
        'status'   => $healthy ? 'ok' : 'degraded',
        'app'      => config('app.name'),
        'database' => $database,
        'time'     => now()->toIso8601String(),
    ], $healthy ? 200 : 503);
})->withoutMiddleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\CheckIfBlocked::class,
])->name('health');
