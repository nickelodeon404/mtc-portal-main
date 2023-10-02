<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function subjectLoad(){
        return $this->belongsTo(SubjectLoad::class, 'subjectLoads_id');
    }
}
