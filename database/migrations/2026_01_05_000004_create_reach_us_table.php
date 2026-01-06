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
        Schema::create('reach_us', function (Blueprint $table) {
            $table->id();
            $table->string('contact_type'); // Email, Phone, Office
            $table->string('title')->nullable(); // عنوان اختياري (مثل: Main Office, Support Email)
            $table->text('value'); // القيمة (البريد الإلكتروني، رقم الهاتف، العنوان)
            $table->text('icon')->nullable(); // أيقونة (رابط الصورة)
            $table->integer('order')->default(0); // ترتيب العرض
            $table->boolean('is_active')->default(true); // تفعيل/تعطيل
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reach_us');
    }
};
