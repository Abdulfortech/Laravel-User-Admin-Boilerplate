<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'orderID',
        'packageID',
        'reference',
        'gateway',
        'channel',
        'method',
        'amount',
        'discount',
        'fees',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
