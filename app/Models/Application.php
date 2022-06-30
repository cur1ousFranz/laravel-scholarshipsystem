<?php

namespace App\Models;

use App\Models\Coordinator;
use App\Models\ApplicantList;
use App\Models\ApplicationDetail;
use App\Models\QualifiedApplicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'coordinators_id',
        'slots',
        'start_date',
        'end_date',
        'batch',
        'status'
    ];

    public function application(){

        $this->belongsTo(Coordinator::class, 'coordinators_id');
    }

    public function applicationDetail(){

        return $this->hasOne(ApplicationDetail::class, 'applications_id');
    }

    public function applicantList(){

        return $this->hasMany(ApplicantList::class, 'applications_id');
    }

    public function qualifiedApplicant(){

        return $this->hasMany(QualifiedApplicant::class, 'appications_id');
    }

}
