<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	use SoftDeletes;

    protected $fillable = ['customer_id', 'system_id', 'no_of_copies', 'subscription_fees', 'is_paid', 'started_at', 'ended_at'];

	public function System()
    {
        return $this->belongsTo('App\System');
    }

	public function Customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
