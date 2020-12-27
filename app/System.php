<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	use SoftDeletes;

    protected $fillable = ['name_ar', 'name_en', 'type_id', 'support_fees'];

	public function Type()
    {
        return $this->belongsTo('App\Type');
    }

	public function Subscriptions()
    {
        return $this->hasMany('App\Subscription');
    }

}
