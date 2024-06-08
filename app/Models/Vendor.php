<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'name',
        'category',
        'nature',
        'market',
        'slang',
        'motto',
        'logo',
        'banner',
        'description',
        'phone1',
        'phone2',
        'whatsapp',
        'website',
        'email',
        'instagram',
        'facebook',
        'state',
        'lga',
        'address',
        'status',
        'start_date',
        'end_date',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'vendorID')->whereNotNull('status');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'vendorID')->whereNotNull('status');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'vendorID')->whereNotNull('status');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'vendorID')->whereNotNull('status');
    }

}
