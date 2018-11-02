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
        require_once dirname(dirname(__FILE__)) . '/class/class.Grid.php';
    }

    public function testGridIsSingleton()
    {
        $oGrid1 = Grid::getInstance(5, 5);
        $this->assertInstanceOf(Grid::class, $oGrid1);
        $this->assertEquals($oGrid1, Grid::getInstance(15, 55));
    }
}
