<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customer_id'; // Specify the primary key

    protected $fillable = [
        'user_id',           // Foreign key
        'name',
        'email',
        'phone',
        'license_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaints::class);
    }
}
