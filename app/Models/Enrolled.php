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
        'provinces',
        'barangay',
        'municipalities',
        'status',
        'grade_level',
        'section',
        'junior_high',
        'graduation_type',

        'strand_id',
    ];

    // Define the relationship with the GradeLevel model (assuming you have one)
/*
    public function gradeLevel()
    {
        return $this->belongsTo(Enrolled::class, 'grade_level');
    }
*/
public function strand()
{
    return $this->belongsTo(Strand::class, 'strand');
}
}
