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
        Schema::table('teachers', function (Blueprint $table) {
            // Modify existing columns or add new columns
            $table->string('teacher_id')->unique()->change();
            $table->string('teacher_name')->change();
            $table->string('username')->unique()->change();
            $table->string('email')->unique()->change();
            $table->enum('gender', ['male', 'female', 'other'])->change();
            $table->date('dob')->change();
            $table->string('mobile_number')->change();
            $table->date('date_joined')->change();
            $table->string('qualification')->change();
            $table->string('experience')->change();
            $table->text('address')->nullable()->change();
            $table->string('city')->change();
            $table->string('state')->change();
            $table->string('country')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Revert the changes made in the up() method if necessary
            $table->string('teacher_id')->change();
            $table->string('teacher_name')->change();
            $table->string('gender')->change(); // Or revert to previous type
            $table->string('dob')->change(); // Or revert to previous type
            $table->string('mobile_number')->change();
            $table->string('date_joined')->change();
            $table->string('qualification')->change();
            $table->string('experience')->change();
            $table->string('username')->change();
            $table->string('email')->change();
            $table->string('address')->nullable(false)->change();
            $table->string('city')->change();
            $table->string('state')->change();
            $table->string('country')->change();
        });
    }
};
