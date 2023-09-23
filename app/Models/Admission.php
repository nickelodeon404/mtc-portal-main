<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admission';
    protected $primaryKey = 'id';
    protected $fillable = [
        'lrn',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'extension',
        'birthday',
        'age',
        'barangay',
        'city_municipality',
        'province',
        'mobile_number',
        'facebook',
        'junior_high',
        'year_graduated',
        'strand',
        'graduation_type',
        'psa',
        'form_138',
        'users_id',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
