<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'type', 'description', 'amount']; 
}