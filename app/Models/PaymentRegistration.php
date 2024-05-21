<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRegistration extends Model
{
    protected $table = 'paymentregistartion';
    protected $fillable = [
        'rieid',
        'transactionid',
        'amount',
        'paymentstatus'
    ];
}
