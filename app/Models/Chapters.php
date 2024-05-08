<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'eochapters';
    protected $fillable = [
        'chapters',
        'description'
    ];
}
