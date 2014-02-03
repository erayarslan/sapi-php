<?php

require_once("Coordinate.php");

class Bus {
    public $id;
    public $coordinate;

    public function __construct() {
        $this->coordinate = new Coordinate();
    }
} 