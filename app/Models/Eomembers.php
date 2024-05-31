<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eomembers extends Model
{
    protected $table = 'eomembers';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'chapter',
        'region',
        'joindt',
        'industry',
        'voucher_amt',
        'exprdt',
        'spouse_id',
        'gender',
        'spouse_status',
        'regstatus'
    ];
}
