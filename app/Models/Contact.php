<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_number',
        'email',
        'applicants_id'
    ];

    protected $with = [
        'applicant',
    ];

    public function applicant(){

        return $this->belongsTo(Applicant::class);
    }
}
