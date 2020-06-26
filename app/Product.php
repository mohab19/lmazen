<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'supplier_id', 'type_id', 'brand_id', 'model_id', 'description', 'buying_price', 'selling_price', 'port_no', 'quantity', 'image'];

    public function Type()
    {
        return $this->belongsTo('App\Type');
    }

    public function Brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function Supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function ProductHistories()
    {
        return $this->hasMany('App\ProductHistory');
    }

    public function Model()
    {
        return $this->belongsTo('App\Model');
    }
}
