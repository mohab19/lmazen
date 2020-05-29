<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SupplierAccount extends Model
{
    use SoftDeletes;

    protected $fillable = ['supplier_id', 'description', 'amount', 'paid', 'remain'];

    public function Supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
