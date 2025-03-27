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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id'); // Primary key for bookings
            $table->unsignedBigInteger('customer_id'); // Foreign key for customers
            $table->unsignedBigInteger('car_id'); // Foreign key for cars
            $table->date('start_date'); // Booking start date
            $table->date('end_date'); // Booking end date
            $table->decimal('total_amount', 8, 2); // Total amount for the booking
            $table->integer('start_mileage')->nullable(); // Starting mileage
            $table->integer('end_mileage')->nullable(); // Ending mileage
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

