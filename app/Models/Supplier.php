<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'adminID',
        'name',
        'type',
        'phone1',
        'phone2',
        'address',
        'description',
        'status',
    ];
}
