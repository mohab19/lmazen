<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'customer_id', 'quantity', 'amount', 'paid'];

    function Customer()
    {
        return $this->belongsTo('App\Customer');
    }

    function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
