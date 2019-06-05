<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeDetail extends Model
{
    protected $fillable = ['box_one_title','box_one_desc','box_one_icon','box_two_title','box_two_desc','box_two_icon','middle_section_title','box_three_title','box_three_desc','box_three_icon','video_title','video_text','video_link','middle_section_image','middle_section_content','company_desc','company_image'
    	];
}
