<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'favourite_type', 'favourite_id'];

    public function Catalog()
    {
        return $this->belongsTo('App\Catalog');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
