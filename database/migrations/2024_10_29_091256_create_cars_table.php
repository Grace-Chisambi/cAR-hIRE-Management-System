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
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->string('make');
            $table->string('model');
            $table->string('license_plate')->unique();
            $table->decimal('daily_rate', 8, 2);
            $table->boolean('available')->default(true);
            $table->integer('current_mileage')->default(0); // In kilometers or miles
            $table->string('image_url')->nullable(); // Column for the car image URL
            $table->integer('capacity')->default(4); // Capacity of the car (number of passengers)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
