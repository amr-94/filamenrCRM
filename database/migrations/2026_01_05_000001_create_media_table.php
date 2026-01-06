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
        if (Schema::hasTable('media')) {
            return;
        }
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            // Polymorphic relations
            $table->morphs('mediable'); // creates mediable_type and mediable_id columns

            // Media information
            $table->string('name'); // اسم الملف
            $table->string('type'); // نوع الميديا (image, video, document, etc)
            $table->string('mime_type'); // MIME type (image/jpeg, video/mp4, etc)
            $table->string('path'); // مسار الملف
            $table->unsignedBigInteger('size')->default(0); // حجم الملف بالبايتات
            $table->string('disk')->default('public'); // الـ disk المستخدم (public, s3, etc)
            $table->text('description')->nullable(); // وصف الميديا
            $table->integer('width')->nullable(); // عرض الصورة/الفيديو
            $table->integer('height')->nullable(); // ارتفاع الصورة/الفيديو
            $table->integer('duration')->nullable(); // مدة الفيديو بالثواني
            $table->boolean('is_primary')->default(false); // هل هي الصورة الرئيسية
            $table->integer('order')->default(0); // ترتيب الميديا

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
