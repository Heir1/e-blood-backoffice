<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftprogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateandhour',
        'campname'
    ];
}
