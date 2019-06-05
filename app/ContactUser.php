<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUser extends Model
{
     protected $fillable = [
         'name','email','phone_no','subject','message','status'
     	]; 
}
