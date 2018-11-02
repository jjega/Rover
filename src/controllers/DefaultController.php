<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 25/10/2018
 * Time: 00:30
 */

namespace App\Controller;

use ProjectNasa\FactoryRover;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    public function __construct($argv)
    {
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
                $oRover = FactoryRover::createRover($argv[$i], $argv[$i + 1], $argv[$i + 2]);
            }

            // Movement
            if (preg_match('#[MRL]+#i', $argv[$i + 3])) {
                $tab_cmd = str_split($argv[$i + 3]);
                foreach ($tab_cmd as $cmd) {
                    FactoryRover::doAction($oRover, $cmd);
                }
                $message = $oRover->getPosition() . "\n";
            } else {
                $message = 'no movement has been assign ' . $argv[$i + 3] . "\n";
            }

            include '../app/print.php';
        }
    }
}