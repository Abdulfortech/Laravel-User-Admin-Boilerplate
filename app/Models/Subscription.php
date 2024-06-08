<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'vendorID',
        'packageID',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendorID');
    }

    public function package()
    {
        return $this->belongsTo(User::class, 'packageID');
    }
}
