<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolled extends Model
{
    use HasFactory;

    protected $table = 'enrolled';
    protected $primaryKey = 'id';

    protected $fillable = [
        'lrn',
        'strand',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'extension',
        'birthday',
        'age',
        'mobile_number',
        'facebook',
        'region',
        'province',
        'barangay',
        'city_municipality',
        'status',
        'grade_level',
        'junior_high',
        'graduation_type',
    ];

    // Define the relationship with the GradeLevel model (assuming you have one)
/*
    public function gradeLevel()
    {
        return $this->belongsTo(Enrolled::class, 'grade_level');
    }
*/
}
