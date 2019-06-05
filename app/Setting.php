<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $fillable = [
    	'header_content','admin_email','primary_contact','secondary_contact','company_loaction','website_email','company_address',
    	'footer_content','facebook_link','youtube_link','instagram_link','header_logo','footer_logo'
    ];
}
