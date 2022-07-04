<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseID',
        'name',
        'duration',
    ];
    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class,'courseID');
    }
    public function videos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Video::class,'unitID');
    }
    public function exam(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Exam::class,'unitID');
    }
}
