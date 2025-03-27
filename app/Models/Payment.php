<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    // Define the fillable fields
    protected $fillable = [
        'bill_id',
        'amount',
        'payment_method',
    ];

    /**
     * Relationship with Bill
     */
    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
}
