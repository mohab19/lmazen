<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en'];

    public function Systems()
    {
        return $this->hasMany('App\System');
    }

}
