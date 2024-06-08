<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'adminID',
        'title',
        'description',
        'price',
        'status',
    ];


    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'adminID');
    }
}
