<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RieMembers extends Model
{
    protected $table = 'riemembers';
    protected $fillable = [
        'eoid',
        'gender',
        'mobile',
        'industry',
        'company',
        'gstno',
        'spouseid',
        'regstatus',
        'addr1',
        'addr2',
        'city',
        'state',
        'pin',
        'country',
        'comaddr1',
        'comaddr2',
        'comcity',
        'comstate',
        'compin',
        'comcountry'
    ];
}
