<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlpPreferences extends Model
{
    protected $table = 'slpprefence';
    protected $fillable = [
        'slpid',
        'flyingfrom',
        'dietpref',
        'allergies',
        'shirtsize',
        'interests',
        'specialrequest'
    ];
    protected $casts = [
        'interests' => 'array',
    ];

}
