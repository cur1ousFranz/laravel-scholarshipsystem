<?php

namespace App\Models;

use App\Models\Coordinator;
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
}
