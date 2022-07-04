<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceReqID',
        'userID',
        'status',
        'price',
    ];
    public function acceptedRequest(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ServiceRequest::class,'offerID');
    }
    public function serviceRequest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class,'serviceReqID');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'userID');
    }
}
