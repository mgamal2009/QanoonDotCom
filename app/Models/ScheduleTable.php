<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'periods',
        'availablePeriods',
        'bookedPeriods',
        'meetingPrice',
        'meetingDuration',
        'userID',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'userID');
    }
    public function meetings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Meeting::class,'scheduleID');
    }
}
