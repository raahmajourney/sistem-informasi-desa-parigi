<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
     protected $table = 'documents';
     protected $fillable = [
        'title',
        'description',
        'file_path',
        'created_by',
    ];
}
