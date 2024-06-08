<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'business';
    protected $fillable = [
        'adminID',
        'title',
        'industry',
        'abbr',
        'motto',
        'reg_no',
        'tax_no',
        'phone1',
        'phone2',
        'website',
        'email',
        'address',
        'state',
        'account_name',
        'account_number',
        'account_bank',
        'logo',
        'banner',
        'status',
    ];
}
