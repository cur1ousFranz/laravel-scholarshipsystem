<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = [

        'applicants_id',
        'desired_school',
        'hei_type',
        'school_last_attended',

    ];

    public function applicant(){

        return $this->belongsTo(Applicant::class);
    }
}
