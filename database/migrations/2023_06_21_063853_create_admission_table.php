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
            $table->string('email')->unique()->nullable(false);
            $table->string('first_name', 50)->nullable(false);
            $table->string('middle_name', 50)->nullable(true);
            $table->string('last_name', 50)->nullable(false);
            $table->string('extension', 5)->nullable(true);
            $table->date('birthday')->nullable(false);
            $table->integer('age')->nullable(false);
            $table->string('barangay')->nullable(false);
            $table->string('municipalities')->nullable(false);
            $table->string('provinces')->nullable(false);
            $table->string('mobile_number', 13)->nullable(false);

            $table->boolean('isVerified')->default(false);
            $table->boolean('is_admitted')->default(false);
            
            $table->string('facebook')->nullable(true);
            $table->string('junior_high')->nullable(false);
            $table->string('year_graduated')->nullable(true);
            $table->string('strand')->nullable(false);
            $table->string('graduation_type')->nullable(false);
            $table->string('psa')->nullable(true);
            $table->text('form_138')->nullable();
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
