<?php

namespace KennerSoftTest\App\Interfaces;

use KennerSoftTest\App\Classes\Robot;

/**
 * Описание интрфейса для строителя
 * @author Dnx89
 */
interface RobotBuilderInterface {
    /*
     * Метод по созданию пустого(дефолтного) обьекта
     */

    public function create(): RobotBuilderInterface;
    /*
     * Метод по присвоению скорости
     */

    public function setSpeed(int $val): RobotBuilderInterface;
    /*
     * Метод по присвоению веса
     */

    public function setWeight(int $val): RobotBuilderInterface;
    /*
     * Метод по присвоению высоты
     */

    public function setHeight(int $val): RobotBuilderInterface;
    /*
     * Метод по получению обьекта Robot исходя из заданых свойств
     */

    public function getRobot(): ?Robot;
}
