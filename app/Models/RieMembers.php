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
        'companyaddr',
        'spouseid',
        'regstatus'
    ];
}
