<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftprogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'p_date',
        'p_starthour',
        'p_endhour',
        'campname'
    ];

}
