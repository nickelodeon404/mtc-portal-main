<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'strands_id',
        'emailaddress',
        'address',
        'mobile_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function admissions(){
        return $this->hasOne(Admission::class, 'users_id');
    }
    public function teacherLoad(){
        return $this->hasMany(SubjectLoad::class, 'faculties_id');
    }
    public function studentLoad(){
        return $this->hasMany(SubjectLoad::class, 'students_id');
    }
    public function Strand(){
        return $this->belongsTo(Strand::class, 'strands_id');
    }

    public function recordRequests()
    {
        return $this->hasMany(RecordRequest::class, 'student_id');
    }

    
}