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
        Schema::create('student_details', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained();
            $table->string('email',100)->nullable()->unique();
            $table->string('twitter',50)->nullable()->unique();
            $table->string('other',500)->nullable();
            $table->timestamps();

            $table->primary('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
