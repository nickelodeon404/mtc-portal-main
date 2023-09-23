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
        Schema::create('admission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onUpdate('cascade');
            $table->string('lrn', 50)->nullable(false);
            $table->string('email')->unique();
            $table->string('first_name', 50)->nullable(false);
            $table->string('middle_name', 50)->nullable(true);
            $table->string('last_name', 50)->nullable(false);
            $table->string('extension', 5)->nullable(true);
            $table->date('birthday')->nullable(false);
            $table->integer('age')->nullable(false);
            $table->string('barangay')->nullable(false);
            $table->string('city_municipality')->nullable(false);
            $table->string('province')->nullable(false);
            $table->string('mobile_number', 11)->nullable(false);
            $table->string('facebook')->nullable(true);
            $table->string('junior_high')->nullable(false);
            $table->string('year_graduated')->nullable(true);
            $table->string('strand')->nullable(false);
            $table->string('graduation_type')->nullable(false);
            $table->string('psa')->nullable(true);
            $table->string('form_138')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission');
    }
};
