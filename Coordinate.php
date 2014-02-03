<?php

class Coordinate {
    public $latitude;
    public $longitude;

    public function __construct() {

    }

    public static function withCoor($latitude,$longitude) {
        $obj = new Coordinate();
        $obj->latitude = $latitude;
        $obj->longitude = $longitude;
        return $obj;
    }

} 