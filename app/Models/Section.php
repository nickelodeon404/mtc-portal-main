<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';
    protected $primaryKey = 'id';

    protected $fillable = [
        'strand_id',
        'grade_level',
    ];

    
/* 
   public function student()
    {
        return $this->belongsTo(Enrolled::class, 'student_id');
    }
*/

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function gradeLevel()
    {
        return $this->belongsTo(Enrolled::class, 'grade_level');
    }
    public function User()
    {
        return $this->hasMany(User::class, 'strands_id', 'section');
    }
    
}
