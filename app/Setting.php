<?php namespace SwiftSum;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	public static function getByName($name)
    {
        $obj = self::whereName($name)->first();
        if(is_null($obj)) {
            return false;
        } else {
            return $obj->value;
        }
    }

}
