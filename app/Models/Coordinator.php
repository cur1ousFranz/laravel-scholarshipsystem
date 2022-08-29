<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coordinator extends Model
{
    use HasFactory;

    protected $with = ['application'];

    public function application(){

       return $this->hasMany(Application::class, 'id');
    }
}
