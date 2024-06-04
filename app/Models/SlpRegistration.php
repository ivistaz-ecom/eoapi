<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlpRegistration extends Model
{
    protected $table = 'slpregistration';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'gender',
        'mobile',
        'industry',
        'company',
        'gstno',
        'regstatus',
        'eoid',
        'addr1',
        'addr2',
        'city',
        'state',
        'pin',
        'country'
    ];
}
