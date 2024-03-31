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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no');
            $table->string('identity_no');
            $table->string('engine_no');
            $table->string('insurance_valid_upto');
            $table->string('tax_valid_upto');
            $table->string('fitness_valid_upto');
            $table->string('pollution_valid_upto');
            $table->string('permit_valid_upto');
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->string('helper_name');
            $table->string('helper_phone');
            $table->string('seats');
            $table->string('department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
