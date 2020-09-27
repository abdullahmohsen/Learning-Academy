<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //category hasMany Courses
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
