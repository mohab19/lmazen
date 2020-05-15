<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $fillable = ['user_id', 'request_type', 'request_email', 'request_description', 'get_price', 'recieve_docs', 'phone_contact'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
