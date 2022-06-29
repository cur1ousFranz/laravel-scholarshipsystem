<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedApplicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'applications_id',
        'applicants_id'
    ];
}
