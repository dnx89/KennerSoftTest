<?php

namespace KennerSoftTest\App\Classes;

use KennerSoftTest\App\Interfaces\RobotBuilderFactoryInterface;
use KennerSoftTest\App\Interfaces\RobotBuilderInterface;
use Exception;

/**
 * Description of RobotBiulderFactory
 * Класс фабрики по производству роботов на основании заготово/шаблонов по определеной логике.
 * @author Dnx89
 */
class RobotBuilderFactory implements RobotBuilderFactoryInterface {
    /*
     * Максимальное количество роботов котррое может создать фабрика за раз 
     */

    const MAX_CREATE_ROBOT = 500;

    protected $builder = null;
    protected $newRobot = null;
    protected $robotTemplate = array();
    protected $kitTemplates = array();

    /*
     * Метод по инициализации строителя 
     */

    public function setBuilder(RobotBuilderInterface $builder): RobotBuilderFactoryInterface {
        $this->builder = $builder;
        return $this;
    }

    /*
     * Метод для сохранения шаблона робота для дальнейше с ним работы
     */

    public function addRobotTemplate(string $name, Robot $robot): bool {
        try {
            if (array_key_exists($name, $this->robotTemplate)) {
                throw new \Exception('Шаблон с именем[' . $name . '] уже существует');
            }
            $this->robotTemplate[$name] = clone $robot;
            return true;
        } catch (Exception $exc) {
            echo PHP_EOL . $exc->getMessage();
            return false;
        }
    }

    /*
     * Метод для получения/подготовки шаблонов робота для дальнейшей с ним работы 
     */

    public function getRobotTemplate(string $name, int $count): RobotBuilderFactoryInterface {
        try {
            if (!array_key_exists($name, $this->robotTemplate)) {
                throw new \Exception('Шаблона с именем[' . $name . '] не существует');
            }
            if ($count < 0) {
                $count = 0;
            }
            $i = 0;
            while ($i < $count) {
                array_push($this->kitTemplates, json_decode(json_encode($this->robotTemplate[$name]), true));
                $i++;
            }
            return $this;
        } catch (Exception $exc) {
            echo PHP_EOL . $exc->getMessage();
            return $this;
        }
    }

    /*
     * Метод для создания робота их ранее полученых шаблонов(набора шаблонов).
     * По итогу возвращает:
     * config - с какими параметрами создавались новые роботы 
     * list - список ново-созданых роботов
     * kit - набор шаблонов из которых были созданы новые роботы
     */

    public function createRobot(int $count): ?\stdClass {
        try {
            if (is_null($this->builder)) {
                throw new \Exception('Не обьявлен строитель');
            }
            if (count($this->kitTemplates) <= 0) {
                throw new \Exception('Нет заготовок из которых можно собрать роботов ');
            }
            if ($count <= 0) {
                throw new \Exception('Не правильно выставлено количество роботов на создание');
            }
            if ($count > self::MAX_CREATE_ROBOT) {
                throw new \Exception('Фабрика не может произвести более 500 едиц за раз');
            }
            $this->newRobot = new \stdClass;
            $this->newRobot->config = array();
            $this->newRobot->list = array();
            $this->newRobot->kit = $this->kitTemplates;
            $this->newRobot->config['speed'] = min(array_column($this->kitTemplates, 'speed'));
            $this->newRobot->config['heigh'] = array_sum(array_column($this->kitTemplates, 'height'));
            $this->newRobot->config['weight'] = array_sum(array_column($this->kitTemplates, 'weight'));
            $i = 0;
            while ($i < $count) {
                $robot = $this->builder->setSpeed($this->newRobot->config['speed'])
                        ->setHeight($this->newRobot->config['heigh'])
                        ->setWeight($this->newRobot->config['weight'])
                        ->getRobot();
                if (is_null($robot)) {
                    throw new \Exception('Строитель не может создать роботов из полученых характеристик');
                };
                array_push($this->newRobot->list, $robot);
                $i++;
            }
            return $this->newRobot;
        } catch (Exception $exc) {
            echo PHP_EOL . $exc->getMessage();
            return null;
        }
    }

}
