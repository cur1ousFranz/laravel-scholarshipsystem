<?php

namespace App\Models;

use App\Models\Submission;
use App\Models\Coordinator;
use App\Models\ApplicationDetail;
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
        'status'
    ];

    public function application(){

        $this->belongsTo(Coordinator::class, 'coordinators_id');
    }

    public function applicationDetail(){

        return $this->hasOne(ApplicationDetail::class, 'applications_id');
    }

    public function submission(){

        return $this->hasMany(Submission::class, 'applications_id');
    }
}
