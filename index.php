<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 13:57
 */

include 'class/CardCompass.php';
include 'class/Grid.php';
include 'class/Rover.php';


use ProjectNasa\Rover;
use ProjectNasa\Grid;

print_r($argv);

// Field
if (preg_match('#[0-9]+#', $argv[1]) && preg_match('#[0-9]+#', $argv[2])) {
    $grid = Grid::getInstance($argv[1], $argv[2]);
}

// get the last key
end($argv);
$last_key = key($argv);
for($i=3;$i<$last_key;$i+=4) {
    // Deploy
    if (preg_match('#[0-9]+#', $argv[$i]) &&
        preg_match('#[0-9]+#', $argv[$i + 1]) &&
        preg_match('#[NEWS]+#', $argv[$i + 2])) {
        $oRover = new Rover($grid, $argv[$i], $argv[$i + 1], $argv[$i + 2]);
        echo 'origin:' . $oRover->getPosition() . "\n";
    }

    // Movement
    if (preg_match('#[MRL]+#i', $argv[$i + 3])) {
        $tab_cmd = str_split($argv[$i + 3]);
        foreach ($tab_cmd as $cmd) {
            $oRover->doAction($cmd);
        }
        echo $oRover->getPosition() . "\n";
    } else {
        echo 'no movement has been assign ' . $argv[$i + 3] . "\n";
    }
}