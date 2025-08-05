<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
     protected $table = 'documents';
     protected $fillable = [
        'title',
        'description',
        'form_link',
        'created_by',
    ];
}
