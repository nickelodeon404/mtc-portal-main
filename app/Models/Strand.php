<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;

    protected $table = 'strands';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'acronym'
    ];

    public function User(){
        return $this->hasMany(User::class, 'strands_id' );
    }
}
