<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function subjectLoad(){
        return $this->hasMany(SubjectLoad::class, 'subjects_id');
    }
}
