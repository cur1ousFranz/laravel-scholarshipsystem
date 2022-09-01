<?php

namespace App\Models;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantList extends Model
{
    use HasFactory;

    protected $fillable = [

        'applications_id',
        'applicants_id',
        'rating',
        'document',
    ];

    public function applicant(){

        return $this->hasMany(Applicant::class, 'id');
    }

    public function application(){

        return $this->belongsTo(Application::class);
    }
}
