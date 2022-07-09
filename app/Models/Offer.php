<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceReqID',
        'clientID',
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
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class,'clientID');
    }
}
