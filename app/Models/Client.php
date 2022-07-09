<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'accountType',
        'birthDate',
        'balance',
        'silverPoints',
        'goldPoints',
        'cvFile',
        'phoneNumber',
        'authenticate',
    ];
    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Course::class,'creatorID');
    }
    public function exams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Exam::class);
    }
    public function boughtCourses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
    public function serviceRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServiceRequest::class,'clientID');
    }
    public function offers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Offer::class,'clientID');
    }
    public function ownerRooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class,'ownerID');
    }
    public function workerRooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class,'workerID');
    }
    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class,'senderID');
    }
    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class,'clientID');
    }
    public function buyRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BuyBookRequest::class,'clientID');
    }
    public function gifts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gift::class,'clientID');
    }
    public function jobs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class,'ownerID');
    }
    public function jobRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobRequest::class, 'clientID');
    }
    public function scheduleTable(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ScheduleTable::class,'clientID');
    }
    public function meetings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Meeting::class,'clientID');
    }
}
