<?php

namespace App\Models;

use App\Models\Rating;
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
        'document',
        'review',
    ];

    public function applicant(){

        return $this->hasMany(Applicant::class, 'id');
    }

    public function application(){

        return $this->belongsTo(Application::class, 'id');
    }

    public function rating(){

        return $this->hasOne(Rating::class, 'applicant_lists_id');
    }

    public function qualifiedApplicant(){

        return $this->hasMany(QualifiedApplicant::class, 'applicant_lists_id');
    }

    public function rejectedApplicant(){

        return $this->hasMany(RejectedApplicant::class, 'applicant_lists_id');
    }
}
