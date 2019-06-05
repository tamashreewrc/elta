<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [
    	'service_category_name','service_category_description','parent_category_id','service_category_icon','status'
    ];
}
