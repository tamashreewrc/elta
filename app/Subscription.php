<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
 protected $fillable = [

 	'name','email','phone_no','teaching','services','individual','corporate','institute','status'

 ];    
}
