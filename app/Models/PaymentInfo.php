<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'paymentinfo';
    protected $fillable = [
        'firstname',
        'lastname',
        'region',
        'amount',
        'email',
        'phone',
        'company',
        'companyaddr',
        'symbol',
        'currency',
        'voucher',
        'exprdt',
        'spouseid',
        'spousestatus',
        'txnid',
        'paymentstatus',
        'memregstatus'
    ];
}
