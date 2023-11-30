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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('role_id')->constrained('roles'); 
            // $table->foreignId('strands_id')->constrained()->onUpdate('cascade'); 
            // $table->enum('year_level', [11, 12, 'not applicable']);
            $table->string('email')->unique();
            $table->string('emailaddress')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('mobile_number', 13)->nullable(false);
            $table->timestamp('email_verified_at')->nullable(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
