<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'type_id', 'company_id', 'description', 'new_product', 'image'];

    public function Type()
    {
        return $this->belongsTo('App\Type');
    }

    public function Company()
    {
        return $this->belongsTo('App\Company');
    }
}
