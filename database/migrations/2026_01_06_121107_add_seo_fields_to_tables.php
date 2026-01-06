<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = ['faqs', 'pricing_plans', 'general_settings'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('seo_title')->nullable();
                $table->text('seo_description')->nullable();
                $table->string('seo_keywords')->nullable();
            });
        }
    }

    public function down(): void
    {
        $tables = ['faqs', 'pricing_plans', 'general_settings'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords']);
            });
        }
    }
};
