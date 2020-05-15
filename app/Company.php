<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'image', 'video', 'description', 'address', 'company_type'];

    public function Product()
    {
        return $this->hasMany('App\Product');
    }

    public function Catalogs()
    {
        return $this->hasMany('App\Catalog');
    }

    public function News()
    {
        return $this->hasMany('App\News');
    }

    public function Events()
    {
        return $this->hasMany('App\Event');
    }

    public function Jobs()
    {
        return $this->hasMany('App\Job');
    }

    public static function getPossibleTypes(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM companies WHERE Field = "company_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

}
