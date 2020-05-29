<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'mobile', 'address'];

    public function Products()
    {
        return $this->hasMany('App\Product');
    }

    public function Accounts()
    {
        return $this->hasMany('App\SupplierAccount');
    }

}
