<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
 // Specify the primary key if it's not 'id'
 protected $primaryKey = 'car_id'; // Change this to your actual primary key

 // Specify if the primary key is not incrementing (if applicable)
 public $incrementing = false;

 // Specify the data type of the primary key if it's not an integer
 protected $keyType = 'string'; // or 'int' if it's an integer


    // Specify fillable properties for mass assignment
    protected $fillable = [
        'make',
        'model',
        'description',
        'image',
        'daily_rate',
        'last_inspected_mileage',
    ];

    // Define the relationship to the bookings model
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Update mileage method
    public function updateMileage($returnMileage)
    {
        $this->last_inspected_mileage = $returnMileage;
        $this->save();
    }
}
