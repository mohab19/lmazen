<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'selling_price', 'quantity'];

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
