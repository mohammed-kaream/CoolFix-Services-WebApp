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
        Schema::create('home_counters', function (Blueprint $table) {
            $table->id();
            $table->string('count_value');   // الرقم الكبير (عملناه string عشان يقبل علامة + أو نص لو بدك مستقبلاً)
            $table->string('title');         // النص التوضيحي (مثال: Repairs Completed)
            $table->string('icon');          // كلاس الأيقونة (مثال: fa-clock)
            $table->string('bg_color');      // لون خلفية الكرت بالكامل (أخضر، موف، أزرق، وردي)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_counters');
    }
};
