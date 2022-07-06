<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [

        'applicants_id',
        'country',
        'province',
        'city',
        'barangay',
        'street',
        'region',
        'zipcode'

    ];
}
