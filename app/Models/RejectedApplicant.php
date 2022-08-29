<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RejectedApplicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'applicants_id',
        'document',
        'added'
    ];
    protected $with = [
        'application',
        'applicant',
    ];

    public function application(){

        return $this->belongsTo(Application::class, 'applications_id');
    }

    public function applicant(){

        return $this->hasMany(Applicant::class, 'id');
    }

}
