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
        Schema::create('subject_loads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained('users')->onUpdate('cascade');
            $table->foreignId('faculties_id')->constrained('users')->onUpdate('cascade');
            $table->foreignId('subjects_id')->constrained('subject_loads')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_loads');
    }
};
