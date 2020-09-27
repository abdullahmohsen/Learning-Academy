<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //trainer hasMany courses
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
