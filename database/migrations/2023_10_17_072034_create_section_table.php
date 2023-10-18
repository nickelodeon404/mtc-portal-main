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
            //$table->foreignId('student_id')->constrained('enrolled', 'id')->onUpdate('cascade')->unsigned();
            $table->foreignId('strand_id')->constrained('strands', 'id')->onUpdate('cascade');
            $table->enum('year_level', [11, 12, 'not applicable']);
            $table->char('name', 5);
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