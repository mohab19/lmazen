<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id', 'name', 'image'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Product()
    {
        return $this->hasMany('App\Product');
    }

    public function Projects()
    {
        return $this->hasMany('App\Project');
    }

}
