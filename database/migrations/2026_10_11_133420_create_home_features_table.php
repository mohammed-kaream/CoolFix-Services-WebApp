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
        Schema::create('home_features', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // عنوان الميزة (مثال: Fast Response)
            $table->text('description'); // تحويله إلى text ليتسع للمقالات والنصوص الطويلة
            $table->string('icon');        // كلاس الأيقونة (مثال: fa-truck)
            $table->boolean('is_active')->default(true); // للتحكم بظهور الميزة أو إخفائها
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_features');
    }
};
