<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EltaDetail extends Model
{
    protected $fillable = [
        'elta_letter', 'elta_word', 'elta_symbol', 'elta_parts_of_speech', 'elta_synonyms', 'description_1', 'description_2', 'status',
    ];
}
