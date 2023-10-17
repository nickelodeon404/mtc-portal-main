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
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('strand_id'); // Foreign key column
            $table->unsignedBigInteger('grade_level'); // Define the grade level column as BIGINT

            // Define the foreign key constraint
            $table->foreign('student_id')->references('id')->on('enrolled');
            $table->foreign('strand_id')->references('id')->on('strands');
            $table->foreign('grade_level')->references('grade_level')->on('enrolled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section');
    }
};


