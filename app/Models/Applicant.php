<?php

namespace App\Models;

use App\Models\User;
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
        'gwa'
    ];

    public function applicant(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
