<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCoupon extends Model
{
    protected $table = 'pricecoupon';
    protected $fillable = [
        'code',
        'exprdt',
        'type',
        'value',
        'count'
    ];
}
