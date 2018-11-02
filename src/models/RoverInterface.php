<?php
/**
 * Created by PhpStorm.
 * User: jega
 * Date: 02/11/2018
 * Time: 19:33
 */

namespace ProjectNasa;


interface RoverInterface
{
    function  move();
    function turn(string $rotate);
    function getPosition();
}