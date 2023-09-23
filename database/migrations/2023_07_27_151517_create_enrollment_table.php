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
        Schema::create('enrollment', function (Blueprint $table) {
            $table->id();
            $table->string('lrn');
            $table->string('email')->nullable(false);
            $table->string('first_name', 50)->nullable(false);
            $table->string('middle_name',50)->nullable(true);
            $table->string('last_name',50)->nullable(false);
            $table->string('extension',5)->nullable(true);
            $table->date('birthday')->nullable();
            $table->integer('age')->nullable(false);
            $table->string('mobile_number', 11)->nullable(false);
            $table->string('facebook')->nullable(true);
            $table->string('region')->nullable(false);
            $table->string('province')->nullable(false);
            $table->string('barangay')->nullable(false);
            $table->string('city_municipality')->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('grade_level')->nullable(false);
            $table->string('junior_high')->nullable(false);
            $table->string('graduation_type')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};