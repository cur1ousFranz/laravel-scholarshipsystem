<?php

namespace App\Models;

use App\Models\Application;
use App\Models\ApplicantList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RejectedApplicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'applicants_id',
        'applicant_lists_id',
        'document',
        'added'
    ];

    public function application(){

        return $this->belongsTo(Application::class, 'applications_id');
    }

    public function applicant(){

        return $this->hasMany(Applicant::class, 'id', 'applicants_id');
    }

    public function applicantList(){

        return $this->belongsTo(ApplicantList::class, 'applicant_lists_id', 'id');
    }

}
