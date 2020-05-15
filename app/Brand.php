<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en'];
    
}