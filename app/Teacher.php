<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
    	'teachers_name', 'teachers_designation', 'teachers_image'
    ];
}
