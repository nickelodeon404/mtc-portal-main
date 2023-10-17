<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSection extends Model
{
    use HasFactory;

    protected $table = 'student_section';
    protected $primaryKey = 'id';

    protected $fillable = [
        'section_id',
        'student_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function student()
    {
        return $this->belongsTo(Enrolled::class, 'student_id');
    }

}
