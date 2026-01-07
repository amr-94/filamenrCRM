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
            $table->string('title')->nullable(); 
            $table->text('value'); 
            $table->text('icon')->nullable(); 
            $table->integer('order')->default(0); 
            $table->boolean('is_active')->default(true); 
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
