<?php

namespace App\Models;

use App\Models\Applicant;
use App\Models\Submission;
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

    public function submission(){

        return $this->belongsTo(Submission::class, 'submissions_id');
    }

    public function applicant(){

        return $this->hasMany(Applicant::class, 'applicants_id');
    }

    public function application(){

        return $this->belongsTo(Application::class, 'applications_id');
    }
}
