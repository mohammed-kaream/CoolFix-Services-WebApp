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
        Schema::create('home_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // العنوان (مثل: Refrigerator Repair)
            $table->string('sub_text');    // النص اللي في الشكل البيضاوي (مثل: Home & kitchen units)
            $table->string('icon');        // الأيقونة (مثل: fa-snowflake)
            $table->string('bg_color');    // لون كرت الهوم (مثل: #4de3a5)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_services');
    }
};
