<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price',
        'file',
        'desc',
        'image',
        'numOfPages',
        'stock',
        'authorName',
        'publisherName',
    ];

    public function buyRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BuyBookRequest::class,'bookID');
    }
}
