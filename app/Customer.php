<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'mobile', 'address'];

    function CustomerHistores()
    {
        return $this->hasMany('App\CustomerHistory');
    }
}
