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
        Schema::create('department_student', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->timestamps();

            $table->primary(['student_id','department_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_student');
    }
};
