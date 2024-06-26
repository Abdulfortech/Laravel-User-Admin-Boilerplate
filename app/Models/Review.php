<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'productID',
        'name',
        'phone',
        'review',
        'rating',
        'status',
    ];
    
}
