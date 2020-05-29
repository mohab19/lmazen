<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [];

    function User()
    {
        return $this->belongsTo('App\User');
    }
}
