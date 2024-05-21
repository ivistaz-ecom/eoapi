<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPackages extends Model
{
    protected $table = 'offerpackages';
    protected $fillable = [
        'packagename',
        'discountpercent',
        'rangestart',
        'rangeend',
        'numbooked',
        'packageorder',
        'offerstatus'
    ];
}
