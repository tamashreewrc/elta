<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategoryContact extends Model
{
     protected $fillable = [
     	'name','email','phone_no','teaching','services','individual','corporate','institute','message','sub_category_id','comment','status'

     ]; 
}
