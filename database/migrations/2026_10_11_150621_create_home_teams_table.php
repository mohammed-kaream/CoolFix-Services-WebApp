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
        // 🎯 قم بتعديل الاسم هنا برمجياً ليصبح عن الأباوت تماماً 👇
        Schema::create('about_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('experience');
            $table->string('repairs_count');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_teams');
    }
};
