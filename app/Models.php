<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use SoftDeletes;

    protected $table = 'models';

    protected $fillable = ['name_ar', 'name_en'];

    public function Products()
    {
        return $this->hasMany('App\Product');
    }
}
