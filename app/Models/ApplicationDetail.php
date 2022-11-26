<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'description',
        'years_in_city',
        'family_income',
        'educational_attainment',
        'gwa',
        'nationality',
        'city',
        'registered_voter',
        'documentary_requirement',
        'application_form'
    ];

    public function application(){

        return $this->belongsTo(Application::class);
    }
}
