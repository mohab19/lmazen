<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en'];

    public function Type()
    {
        return $this->hasMany('App\Type');
    }
}
