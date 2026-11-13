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
    Schema::create('pricings', function (Blueprint $table) {
        $table->id();
        $table->string('name');             // اسم الباقة (Basic Checkup)
        $table->string('description');      // الوصف التفصيلي الصغير
        $table->integer('price');           // السعر (80)
        $table->string('billing_period');   // دورية الدفع النصية (/ VISIT)
        $table->string('button_text')->default('BOOK THIS VISIT'); // نص زر الحجز
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
