<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'city',
        'district',
        'street',
        'buildingNum',
        'floorNum',
        'unitNum',
        'totalPrice',
        'coupon',
        'totalNumOfBooks',
        'netPrice',
        'items',
    ];
}
