<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //course belongsTo one category
    public function cat()
    {
        return $this->belongsTo('App\Models\Cat');
    }

    //course belongsTo one trainer
    public function trainer()
    {
        return $this->belongsTo('App\Models\Trainer');
    }

    //courses belongsToMany students
    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }



}
