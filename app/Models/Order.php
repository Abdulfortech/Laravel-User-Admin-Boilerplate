<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'productID',
        'orderCode',
        'name',
        'phone',
        'address',
        'quantity',
        'description',
        'total',
        'delivery',
        'subtotal',
        'status',
        'paymentStatus',
        'deliveryType',
        'deliveredBy',
        'deliveredAt',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    
}
