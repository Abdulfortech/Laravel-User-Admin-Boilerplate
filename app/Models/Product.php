<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'adminID',
        'title',
        'category',
        'subcategory',
        'brand',
        'productCode',
        'body',
        'main_picture',
        'image1',
        'image2',
        'image3',
        'image4',
        'normal_price',
        'price',
        'short_desc',
        'long_desc',
        'status',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'adminID');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class, 'productID')->whereNotNull('status');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'productID')->whereNotNull('status');
    }

}
