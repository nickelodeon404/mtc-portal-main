<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrolled', function (Blueprint $table) {
            $table->id();
            $table->string('lrn');
            $table->string('strand')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('first_name', 50)->nullable(false);
            $table->string('middle_name', 50)->nullable(true);
            $table->string('last_name', 50)->nullable(false);
            $table->string('section', 20)->nullable(false);
            $table->string('extension', 5)->nullable(true);
            $table->date('birthday')->nullable();
            $table->integer('age')->nullable(false);
            $table->string('mobile_number', 13)->nullable(false);
            $table->string('emergency_number', 13)->nullable(false);
            $table->string('facebook')->nullable(true);
            $table->string('region')->nullable(false);
            $table->string('provinces')->nullable(false);
            $table->string('barangay')->nullable(false);
            $table->string('municipalities')->nullable(false);
            $table->string('status')->nullable(false);

            $table->bigInteger('grade_level')->unsigned();
            /*
                        // Create a foreign key column
                        $table->foreignId('grade_level')
                              ->references('id')
                              ->on('enrolled')
                              ->onUpdate('cascade')
                              ->onDelete('cascade');
            */
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
        Schema::dropIfExists('enrolled');
    }
};




