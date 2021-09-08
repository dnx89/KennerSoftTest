<?php

namespace KennerSoftTest\App\Interfaces;

use KennerSoftTest\App\Interfaces\RobotBuilderInterface;
use KennerSoftTest\App\Classes\Robot;

/**
 * Описание интрфейса для для фабрики по созданию роботов
 * @author Dnx89
 */
interface RobotBuilderFactoryInterface {
    /*
     * Метод по инициализации строителя 
     */

    public function setBuilder(RobotBuilderInterface $builder): RobotBuilderFactoryInterface;
    /*
     * Метод для сохранения шаблона робота для дальнейше с ним работы
     */

    public function addRobotTemplate(string $name, Robot $robot): bool;
    /*
     *Метод для получения/подготовки шаблонов робота для дальнейшей с ним работы 
     */

    public function getRobotTemplate(string $name, int $count): RobotBuilderFactoryInterface;
    /*
     * Метод для создания робота их ранее полученых шаблонов(набора шаблонов)
     */

    public function createRobot(int $count): ?\stdClass;
}
