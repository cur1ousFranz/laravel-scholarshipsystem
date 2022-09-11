<?php

namespace App\Models;

use App\Models\ApplicantList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatingReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_lists_id',
        'rating'
    ];

    protected $with = ['applicantList'];

    public function applicantList(){

        return $this->belongsTo(ApplicantList::class , 'id');
    }

}
