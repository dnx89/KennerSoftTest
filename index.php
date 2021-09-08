<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use KennerSoftTest\App\Classes\RobotBuilder;
use KennerSoftTest\App\Classes\RobotBuilderFactory;

echo PHP_EOL . 'Hello' . PHP_EOL;

$robotBuilder = new RobotBuilder();
/*
 * Создаем 1 вид робота
 */
$robotNinja = $robotBuilder->setSpeed(50)->setHeight(5)->setWeight(10)->getRobot();
echo PHP_EOL . '------robotNinja------' . PHP_EOL;
var_dump($robotNinja);
/*
 * Создаем 2 вид робота
 */
$robotBoxer = $robotBuilder->setSpeed(5)->setHeight(50)->setWeight(20)->getRobot();
echo PHP_EOL . '------robotBoxer------' . PHP_EOL;
var_dump($robotBoxer);


$Factory = new RobotBuilderFactory();
/*
 * Сохраняем 1 вид робота в качестве шаблона
 */
$Factory->addRobotTemplate('robotNinja', $robotNinja);
/*
 * Сохраняем 2 вид робота в качестве шаблона
 */
$Factory->addRobotTemplate('robotBoxer', $robotBoxer);
/*
 * Сохраняем 2 вид робота в качестве шаблона и получаем сообщение об ошибке что уже такой шаблон есть
 */
$Factory->addRobotTemplate('robotBoxer', $robotBoxer);


/*
 * На основании шаблонов и их комбинации создаем список новых роботов
 */

$robots = $Factory->setBuilder($robotBuilder)->getRobotTemplate('robotNinja', 2)->getRobotTemplate('robotBoxer', 2)->createRobot(2);
var_dump($robots);
?>

