<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientID',
        'serviceID',
        'offerID',
        'desc',
        'files',
        'status',
        'minPrice',
        'maxPrice',
        'deliveredFiles',
    ];
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class,'clientID');
    }
    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class,'serviceID');
    }
    public function acceptedOffer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Offer::class,'offerID');
    }
    public function allOffers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Offer::class,'serviceReqID');
    }
    public function room(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Room::class,'serviceReqID');
    }
}
