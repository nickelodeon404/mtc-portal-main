<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicRecordDocuments extends Model
{
    use HasFactory;

    protected $table = 'academic_record_documents';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function documentTypes()
    {
        return $this->hasMany(DocumentType::class);
    }

}
