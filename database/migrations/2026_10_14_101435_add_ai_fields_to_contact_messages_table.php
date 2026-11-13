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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->text('ai_diagnosis')->nullable()->after('describe');
            $table->string('source')->default('contact')->after('ai_diagnosis'); // contact | faq_ai
            $table->string('status')->default('new')->after('source');           // new | contacted | done
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['ai_diagnosis', 'source', 'status']);
        });
    }
};
