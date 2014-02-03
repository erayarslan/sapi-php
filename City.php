<?php

require_once("Utils.php");
require_once("Line.php");

class City {
    private $utils;
    public $lineList;

    public function __construct() {
        $this->utils = new Utils();
        $this->lineList = array();

        $start = $this->utils->getStartNode();
        $temp = $start;

        // Line
        while($temp->nextSibling) {
            $lineName = $temp->nextSibling->firstChild->firstChild->nextSibling->textContent;
            $foundLineName = false;
            foreach($this->lineList as $i){
                if($i->name==$lineName) {
                    $foundLineName = true;
                }
            } if(!$foundLineName) {
                $line = new Line();
                $line->name = $lineName;
                $this->lineList[] = $line;
            }
            $temp = $temp->nextSibling;
        }
        $temp = $this->utils->getStartNode();
        // Bus
        while($temp->nextSibling) {
            $busNo = $temp->nextSibling->firstChild->firstChild->textContent;
            $lineName = $temp->nextSibling->firstChild->firstChild->nextSibling->textContent;
            $coordinate = $temp->nextSibling->firstChild->firstChild->nextSibling->nextSibling->textContent;
            foreach($this->lineList as $i) {
                if($i->name==$lineName) {
                    $tempSwap = explode(",", $coordinate);
                    $bus = new Bus();
                    $bus->id = $busNo;
                    $tempCoordinate = new Coordinate();
                    $bus->coordinate = $tempCoordinate->withCoor($tempSwap[1],$tempSwap[0]);
                    $i->busList[] = $bus;
                }
            }
            $temp = $temp->nextSibling;
        }
    }

} 