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

    public function applicant(){

        return $this->belongsTo(Applicant::class);
    }
}
