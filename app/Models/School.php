<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [

        'applicants_id',
        'desired_school',
        'hei_type',
        'school_last_attended',

    ];
}
