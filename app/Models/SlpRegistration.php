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
        'gender',
        'mobile',
        'industry',
        'company',
        'companyaddr',
        'gstno',
        'regstatus',
        'eoid'
    ];
}
