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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('teacher_id')->unique(); // Assuming it's unique
            $table->string('teacher_name');
            $table->enum('gender', ['male', 'female', 'other']); // Enum for gender
            $table->date('dob'); // Date of Birth
            $table->string('mobile_number'); // Consider validation on mobile number
            $table->date('date_joined'); // Date Joined
            $table->string('qualification');
            $table->string('experience');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address')->nullable(); // Nullable address
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
