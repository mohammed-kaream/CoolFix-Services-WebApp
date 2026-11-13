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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // اسم الخدمة (مثل: Refrigerator Repair)
            $table->string('category');          // القسم (مثل: Home Appliances)
            $table->string('icon');              // اسم الأيقونة (عشان نغير شكل الأيقونة لكل كرت)
            $table->integer('starting_price');   // السعر اللي في المستطيل الغامق (مثل: 80)
            $table->string('duration');          // الوقت (مثل: Same-day visit)
            $table->string('warranty');          // الضمان (مثل: 6-mo warranty)
            $table->string('description');          // الوقت (مثل: Same-day visit)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
