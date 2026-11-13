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
        Schema::create('about_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');          // حقل السؤال العريض (How much does a repair cost?)
            $table->text('answer');              // حقل الجواب التفصيلي المنسدل (A diagnostic visit starts at...)
            $table->boolean('is_active')->default(true); // حالة السؤال نشط أم معطل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_faqs');
    }
};

