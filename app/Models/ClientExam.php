<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'exam_id',
    ];
}
