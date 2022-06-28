<?php

namespace App\Models;

use App\Models\User;
use App\Models\School;
use App\Models\Address;
use App\Models\Contact;
use App\Models\ApplicantList;
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
        'age',
        'gender',
        'civil_status',
        'nationality',
        'educational_attainment',
        'years_in_city',
        'family_income',
        'registered_voter',
        'gwa'
    ];

    public function applicant(){
        return $this->belongsTo(User::class, 'users_id');
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

        return $this->belongsTo(ApplicantList::class, 'applicants_id');
    }
}
