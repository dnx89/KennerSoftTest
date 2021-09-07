<?php

//declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

use KennerSoftTest\App\Classes\RobotBuilder;
use KennerSoftTest\App\Classes\RobotBuilderFactory;

echo PHP_EOL . 'Hello' . PHP_EOL;


$robot = new RobotBuilder();
$robotNinja = $robot->setSpeed(50)->setHeight(5)->setWeight(10)->getRobot();
echo PHP_EOL . '------robotNinja------' . PHP_EOL;
var_dump($robotNinja);
$robotBoxer = $robot->setSpeed(5)->setHeight(50)->setWeight(20)->getRobot();
echo PHP_EOL . '------robotBoxer------' . PHP_EOL;
var_dump($robotBoxer);


$Factory = new RobotBuilderFactory();
$Factory->addRobotTemplate('robotNinja', $robotNinja);
$Factory->addRobotTemplate('robotBoxer', $robotBoxer);
$Factory->addRobotTemplate('robotBoxer', $robotBoxer);



$robots = $Factory->setBuilder($robot)->getRobotTemplate('robotNinja', 5)->getRobotTemplate('robotBoxer', 10)->createRobot(2);
var_dump($robots);

?>

