<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectLoad extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(User::class, 'faculties_id');
    }
    public function student(){
        return $this->belongsTo(User::class, 'students_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subjects_id');
    }
    public function grades(){
        return $this->hasOne(Grade::class, 'subjectLoads_id');
    }
}
