<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['sector_id', 'name'];

    public function Sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function Type()
    {
        return $this->hasMany('App\Type');
    }
}
