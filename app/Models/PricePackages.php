<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePackages extends Model
{
    protected $table = 'pricepackages';
    protected $fillable = [
        'packagename',
        'packageorder',
        'memberfee',
        'slpfee',
        'numbooked',
        'totalcount',
        'offerstatus'
    ];
}
