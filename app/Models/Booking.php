<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'cottage',
        'date_from',
        'date_to',
        'name',
        'email',
        'phone',
        'note'
    ];
}
