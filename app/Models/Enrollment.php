<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollment';
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
        // 'age',
        'mobile_number',
        'emergency_number',
        'facebook',
        'region',
        'provinces',
        'barangay',
        'municipalities',
        'status',
        'grade_level',
        'junior_high',
        'graduation_type',
    ];
}
