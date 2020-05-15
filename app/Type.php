<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id', 'name_ar', 'name_en'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Product()
    {
        return $this->hasMany('App\Product');
    }

}
