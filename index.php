<?php
require_once __DIR__ . '/vendor/autoload.php';

use KennerSoftTest\App\Classes\RobotBuilder;

$robot = new RobotBuilder();
var_dump($robot);
$robotNinja= $robot->setSpeed(50)->setHeight(5)->setWeight(5)->getRobot();
var_dump($robot);
var_dump($robotNinja);
$robotBoxer= $robot->setSpeed(5)->setHeight(50)->setWeight(50)->getRobot();
var_dump($robotBoxer);


echo PHP_EOL. 'Hello'.PHP_EOL;

?>

