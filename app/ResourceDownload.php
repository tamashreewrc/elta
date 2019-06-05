<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceDownload extends Model
{
    protected $fillable = [
  	 'title','subtitle','author','book','note','status'
  ];
}
