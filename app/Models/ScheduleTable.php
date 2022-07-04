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
}
