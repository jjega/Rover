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
        return new Rover(Grid::getInstance(), $x, $y, $dir, $speed);
    }
}