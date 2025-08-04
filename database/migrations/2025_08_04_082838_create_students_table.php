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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('civility', ['MR', 'MRS']);
            $table->enum('status', ['ACTIVE', 'DELETED'])->default('ACTIVE');
            $table->date('date_of_birth');
            $table->softDeletes();

            // connect user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
