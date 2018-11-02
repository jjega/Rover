<?php
/**
 * Created by PhpStorm.
 * User: jega
 * Date: 02/11/2018
 * Time: 17:55
 */

namespace ProjectNasa;


class FactoryRover
{
    static function createRover(int $x, int $y, string $dir, int $speed = 1) {
        $card_compass = new CardCompass();
        return new Rover(Grid::getInstance(), $card_compass, $x, $y, $dir, $speed);
    }

    public static function doAction(Rover $rover, $action)
    {
        switch ($action) {
            case 'R':
            case 'L':
                $rover->turn($action);
                break;
            case 'M':
                $rover->move();
                break;
        }
    }
}