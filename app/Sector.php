<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sector extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sector_type'];

    public function Categories()
    {
        return $this->hasMany('App\Category');
    }

    public function Jobs()
    {
        return $this->hasMany('App\Job');
    }

    public static function getPossibleTypes(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM sectors WHERE Field = "sector_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

    public static function getPossibleDevisions(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM sectors WHERE Field = "sector_devision"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
}
