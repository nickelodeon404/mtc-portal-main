<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordRequest extends Model
{
    use HasFactory;

    protected $table = 'record_requests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'student', 
        'mobile_number', 
        'document_type', 
        'purpose', 
        'is_approved', 
        'claim_by', 
        'message_date', 
        'message_time'
    ];

    public function student()
    {
        return $this->belongsTo(Admission::class, 'student_id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type');
    }
}