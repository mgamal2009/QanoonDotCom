<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable=[
        'email',
        'password',
    ];
    public function gifts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gift::class,'adminID');
    }
}
