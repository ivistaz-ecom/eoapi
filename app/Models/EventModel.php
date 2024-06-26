<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'eventdetail';
    protected $fillable = [
        'eventname',
        'strdt',
        'enddt',
        'offerstatus',
        'chapter',
        'region'
    ];
}
