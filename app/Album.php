<?php namespace SwiftSum;

class Album {

    public static function createFromAPI($response)
    {
        $instance = new self;
        foreach($response as $key => $value)
        {
            $instance->$key = $value;
        }

        return $instance;
    }

}
