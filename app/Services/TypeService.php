<?php

namespace App\Services;

use App\Models\AppConfig;
use Illuminate\Http\Request;

/**
 * Class TypeService
 * @package App\Services
 */
class TypeService
{
    public function typeList($name)
    {
        $val = AppConfig::where('item', $name)->first();
        $data = json_decode($val->value);
        return $data;
    }
    public static function singletype($name, $id)
    {
        $val = AppConfig::where('item', $name)->first();
        $data = json_decode($val->value);
        foreach($data as $item){
            if($item->id == $id){
                return $item->name;
            }
        }
        return null;
    }
    
    public function single($name, $id)
    {
        $val = AppConfig::where('item', $name)->first();
        $data = json_decode($val->value);
        foreach($data as $item){
            if($item->id == $id){
                return [$item];
            }
        }
        return '0';
    }

    

}
