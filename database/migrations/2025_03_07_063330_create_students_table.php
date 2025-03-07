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
            $table->bigInteger('roll_no');
            $table->string('name');
            $table->string('school');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone', 10);
            $table->string('class');
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('image')->nullable();
            $table->timestamps();

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
