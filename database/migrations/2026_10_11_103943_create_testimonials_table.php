<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // اسم العميل (مثال: Huda Nassar)
            $table->string('location');         // العنوان/المنطقة (مثال: Al-Nasr, Gaza)
            $table->string('avatar')->nullable(); // مسار صورة العميل الشخصية
            $table->text('feedback');           // نص الرسالة أو التقييم المكتوب
            $table->integer('stars')->default(5); // عدد النجوم للتقييم
            $table->boolean('is_active')->default(true); // للتحكم بظهور الرأي أو إخفائه
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
