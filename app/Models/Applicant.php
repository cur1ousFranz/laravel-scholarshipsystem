<?php

namespace App\Models;

use App\Models\User;
use App\Models\School;
use App\Models\Address;
use App\Models\Contact;
use App\Models\ApplicantList;
use App\Models\QualifiedApplicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'civil_status',
        'nationality',
        'educational_attainment',
        'years_in_city',
        'family_income',
        'registered_voter',
        'gwa'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function school(){

        return $this->hasOne(School::class, 'applicants_id');
    }

    public function address(){

        return $this->hasOne(Address::class, 'applicants_id');
    }

    public function contact(){

        return $this->hasOne(Contact::class, 'applicants_id');
    }

    public function applicantList(){

        return $this->belongsTo(ApplicantList::class);
    }

    public function qualifiedApplicant(){

        return $this->belongsTo(QualifiedApplicant::class, 'applicants_id');
    }
}
