<?php

declare(strict_types=1);

namespace KennerSoftTest\App\Classes;

use KennerSoftTest\App\Classes\Robot;
use KennerSoftTest\App\Interfaces\RobotBuilderInterface;

class RobotBuilder implements RobotBuilderInterface {

    private $robot;

    public function __construct() {
        $this->create();
    }

    /*
     * Метод по созданию пустого(дефолтного) обьекта
     */

    public function create(): RobotBuilderInterface {
        $this->robot = new Robot();

        return $this;
    }

    /*
     * Метод по присвоению скорости
     */

    public function setSpeed(int $val): RobotBuilderInterface {

        try {
            if ($val > 100) {
                throw new Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new Exception('Скорость не может быть меньше 0');
            }
            $this->robot->speed = $val;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по присвоению веса
     */

    public function setWeight(int $val): RobotBuilderInterface {
        try {
            if ($val > 100) {
                throw new Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new Exception('Скорость не может быть меньше 0');
            }
            $this->robot->weight = $val;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по присвоению высоты
     */

    public function setHeight(int $val): RobotBuilderInterface {
        try {
            if ($val > 100) {
                throw new Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new Exception('Скорость не может быть меньше 0');
            }
            $this->robot->height = $val;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по получению обьекта Robot исходя из заданых свойств
     */

    public function getRobot(): Robot {
        $result = $this->robot;
        $this->create();
        return $result;
    }

}
?>

