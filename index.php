<?php

require_once("City.php");
require_once("Error.php");

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'debug' => true
));

$app->get('/', function () {
    $city = new City();
	echo json_encode($city);
});

$app->get('/lines', function () {
    $city = new City();
    $lineNameList = array();
    foreach($city->lineList as $i) {
        $lineNameList[] = $i->name;
    }
	echo json_encode($lineNameList);
});

$app->get('/line/:name', function($name){
    $city = new City();
    $matchedLines = array();
    foreach($city->lineList as $i) {
        if($i->name==$name) {
            $matchedLines[] = $i;
        }
    }
    echo json_encode($matchedLines);
});

$app->get('/line/:name/bus/:id', function($name,$id){
    $city = new City();
    $matchedBuses = array();
    foreach($city->lineList as $i) {
        if($i->name==$name) {
            foreach($i->busList as $j) {
                if($j->id==$id) {
                    $matchedBuses[] = $j;
                }
            }
        }
    }
    echo json_encode($matchedBuses);
});



$app->notFound(function () {
    $error = new Error();
    $error->setMessage("Not Found");
    $error->setDocumentationUrl("https://github.com/8cookin/sapi-php");
    echo json_encode($error);
});

$app->run();