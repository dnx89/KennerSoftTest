<?php

namespace KennerSoftTest\App\Interfaces;

use KennerSoftTest\App\Interfaces\RobotBuilderInterface;
use KennerSoftTest\App\Classes\Robot;

/**
 *
 * @author Dnx89
 */
interface RobotBuilderFactoryInterface {

    public function setBuilder(RobotBuilderInterface $builder): RobotBuilderFactoryInterface;
    
    public function addRobotTemplate(string $name, Robot $robot): bool;

    public function getRobotTemplate(string $name, int $count): RobotBuilderFactoryInterface;

    public function createRobot(int $count): ?\stdClass;
}
