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
        require_once dirname(dirname(__FILE__)) . '/class/class.CardCompass.php';
    }

    public function testCardCompasMove()
    {
        $oCardCompass = new CardCompass();
        $oCardCompass->setDirection('N');

        $oCardCompass->turnLeft();
        $this->assertFalse($oCardCompass->getDirectionLabel() === 'N');
        $this->assertEquals($oCardCompass->getDirectionLabel(), 'W');
        $this->assertEquals($oCardCompass->getDirectionInfo(), array('target'=>'x', 'value'=>-1));

        $oCardCompass->turnRight();
        $this->assertFalse($oCardCompass->getDirectionLabel() === 'W');
        $this->assertEquals($oCardCompass->getDirectionLabel(), 'N');
        $this->assertEquals($oCardCompass->getDirectionInfo(), array('target'=>'y', 'value'=>1));
    }
}
