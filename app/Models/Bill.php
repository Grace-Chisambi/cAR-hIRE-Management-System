<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    use HasFactory;

    protected $table = 'bills';

    // Define the fillable fields
    protected $fillable = [
        'booking_id',
        'amount',
    ];

    /**
     * Relationship with Booking (Assuming a Booking model exists)
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    /**
     * Relationship with Payment
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'bill_id');
    }
}
