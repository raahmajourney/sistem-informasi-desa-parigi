<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image','author', 'activity_date', 'created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

