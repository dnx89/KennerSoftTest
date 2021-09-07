<?php

namespace KennerSoftTest\App\Classes;

use KennerSoftTest\App\Interfaces\RobotBuilderInterface;
use KennerSoftTest\App\Classes\Robot;
use Exception;

class RobotBuilder implements RobotBuilderInterface {

    const
            MAX_SPEED = 1000,
            MAX_WEIGHT = 1000,
            MAX_HEIGHT = 1000,
            /*
             * Список ошибок
             */
            FLAG_ERROR_SPEED = 0x001,
            FLAG_ERROR_WEIGHT = 0x002,
            FLAG_ERROR_HEIGTH = 0x004;

    private $robot;
    private $error;

    public function __construct() {
        $this->create();
    }

    /*
     * Метод по созданию пустого(дефолтного) обьекта
     */

    public function create(): RobotBuilderInterface {
        $this->error = 0;
        $this->robot = new Robot();

        return $this;
    }

    /*
     * Метод по присвоению скорости
     */

    public function setSpeed(int $val): RobotBuilderInterface {

        try {
            if ($val > self::MAX_SPEED) {
                throw new \Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new \Exception('Скорость не может быть меньше 0');
            }
            $this->robot->speed = $val;
        } catch (Exception $exc) {
            $this->error |= self::FLAG_ERROR_SPEED;
            echo PHP_EOL . $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по присвоению веса
     */

    public function setWeight(int $val): RobotBuilderInterface {
        try {
            if ($val > self::MAX_WEIGHT) {
                throw new Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new Exception('Скорость не может быть меньше 0');
            }
            $this->robot->weight = $val;
        } catch (Exception $exc) {
            $this->error |= self::FLAG_ERROR_WEIGHT;
            echo PHP_EOL . $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по присвоению высоты
     */

    public function setHeight(int $val): RobotBuilderInterface {
        try {
            if ($val > self::MAX_HEIGHT) {
                throw new Exception('Скорость не может быть больше 100');
            }
            if ($val < 0) {
                throw new Exception('Скорость не может быть меньше 0');
            }
            $this->robot->height = $val;
        } catch (Exception $exc) {
            $this->error |= self::FLAG_ERROR_WEIGHT;
            echo PHP_EOL . $exc->getMessage();
        }

        return $this;
    }

    /*
     * Метод по получению обьекта Robot исходя из заданых свойств
     */

    public function getRobot(): ?Robot {
        if ($this->error > 0) {
            $result = null;
        } else {
            $result = $this->robot;
        }
        $this->create();
        return $result;
    }

}
?>

