<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordRequest extends Model
{
    use HasFactory;

    protected $table = 'record_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['student', 'document_type', 'purpose', 'is_approved', 'claim_by'];


}
