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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('legal_name')->unique();
            $table->string('commercial_name');
            $table->enum('education_level', ['PRIMARY_SCHOOL', 'JUNIOR_HIGH_SCHOOL', 'SENIOR_HIGH_SCHOOL']);
            $table->string('mobile_phone');
            $table->string('email');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('address');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
    }
};
