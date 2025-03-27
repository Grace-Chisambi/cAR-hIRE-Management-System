<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['rental_id', 'feedback_text', 'rating'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
