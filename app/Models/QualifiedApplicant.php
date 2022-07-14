<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QualifiedApplicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'applicants_id',
        'document',
        'added'
    ];

    /**
     * This is for search function of qualified applicant list
     */
    public function scopeFilter($query, array $filters){

        if($filters['search'] ?? false){

            $query->where('first_name', 'like', '%' . request('search') .'%')
            ->orWhere('middle_name', 'like', '%' . request('search') .'%')
            ->orWhere('last_name', 'like', '%' . request('search') .'%')
            ->orWhere('age', 'like', '%' . request('search') .'%')
            ->orWhere('gender', 'like', '%' . request('search') .'%')
            ->orWhere('civil_status', 'like', '%' . request('search') .'%')
            ->orWhere('nationality', 'like', '%' . request('search') .'%')
            ->orWhere('educational_attainment', 'like', '%' . request('search') .'%')
            ->orWhere('years_in_city', 'like', '%' . request('search') .'%')
            ->orWhere('family_income', 'like', '%' . request('search') .'%')
            ->orWhere('registered_voter', 'like', '%' . request('search') .'%')
            ->orWhere('gwa', 'like', '%' . request('search') .'%');
        }
    }

    public function application(){

        return $this->belongsTo(Application::class, 'applications_id');
    }

    public function applicant(){

        return $this->hasMany(Applicant::class, 'applicants_id', 'id');
    }
}
