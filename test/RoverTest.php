<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 19:25
 */

use ProjectNasa\Rover;
use ProjectNasa\Grid;
use ProjectNasa\CardCompass;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function setUp()
    {
        require_once dirname(dirname(__FILE__)) . '/class/Rover.php';
        require_once dirname(dirname(__FILE__)) . '/class/Grid.php';
        require_once dirname(dirname(__FILE__)) . '/class/CardCompass.php';
    }

    public function testRoverCreation()
    {
        $oRover = new Rover(1, 2, 'N');
        $this->assertInstanceOf(Rover::class, $oRover);
        $this->assertEquals($oRover->getPosition(), '1;2;N');
    }

    public function testRoverAction()
    {
        $movement = 'LMRM';
        Grid::getInstance(5, 5);
        $oRover = new Rover(1, 2, 'N');

        $tab_cmd = str_split($movement);

        $oRover->doAction($tab_cmd[0]);
        $this->assertEquals($oRover->getPosition(), '1;2;W');

        $oRover->doAction($tab_cmd[1]);
        $this->assertEquals($oRover->getPosition(), '0;2;W');

        $oRover->doAction($tab_cmd[2]);
        $this->assertEquals($oRover->getPosition(), '0;2;N');

        $oRover->doAction($tab_cmd[3]);
        $this->assertEquals($oRover->getPosition(), '0;3;N');

    }
}
