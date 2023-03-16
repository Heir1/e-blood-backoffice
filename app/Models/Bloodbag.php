<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodbag extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'type',
        'rhesus',
        'mass',
        'price_status',
        'batchcode',
        'collectiondate',
        'expirationdate'
    ];

    protected $casts = [
        'collectiondate' => 'date:d/m/Y',
        'expirationdate' => 'date:d/m/Y'
    ];
}
