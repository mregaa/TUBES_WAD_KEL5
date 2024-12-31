<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'menu_nama',
        'quantity',
        'price',
        'image',
        'menu_id',
        'payment_status',
        'delivery_status'
    ];
}
