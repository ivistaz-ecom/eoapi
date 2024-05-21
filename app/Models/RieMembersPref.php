<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RieMembersPref extends Model
{
    protected $table = 'riememberspref';
    protected $fillable = [
        'eoid',
        'flyingfrom',
        'dietpref',
        'allergies',
        'shirtsize',
        'interests',
        'specialrequest'
    ];
}
