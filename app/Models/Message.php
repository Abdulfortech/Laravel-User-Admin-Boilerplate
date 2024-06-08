<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'name',
        'phone',
        'subject',
        'body',
        'contact',
        'isRead',
        'status',
    ];
    
}
