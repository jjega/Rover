<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 10:42
 */

namespace ProjectNasa;

class Rover
{
    private $_x;
    private $_y;
    private $_direction;
    private $_speed;
    private $_grid;

    public function __construct($x, $y, $dir, $speed = 1)
    {
        $this->_x = $x;
        $this->_y = $y;
        $this->_direction = new CardCompass();
        $this->_direction->setDirection($dir);
        $this->_speed = $speed;
        $this->_grid = Grid::getInstance();
    }

    /**
     * Return Rover position
     * @return string
     */
    public function getPosition()
    {
        return "{$this->_x};{$this->_y};{$this->_direction->getDirectionLabel()}";
    }

    /**
     * @param $action have to repect this rule /[MLR]/i
     * @return void
     */
    public function doAction($action)
    {
        switch ($action) {
            case 'R':
            case 'L':
                $this->_turn($action);
                break;
            case 'M':
                $this->_move();
                break;
        }
    }

    // Private
    /**
     * @param $rotate
     * @return void
     */
    private function _turn($rotate)
    {
        if ($rotate === 'R') {
            $this->_direction->turnRight();
        } else if ($rotate === 'L') {
            $this->_direction->turnLeft();
        }
    }

    /**
     * Applying wich has been settings up
     * @return void
     */
    private function _move()
    {
        $direction_info = $this->_direction->getDirectionInfo();
        switch ($direction_info['target']) {
            case 'x':
                $this->_x += ($direction_info['value'] * $this->_speed);
                if ($this->_x > $this->_grid->getTop('x')) {
                    $this->_x = $this->_grid->getTop('x');
                } else if ($this->_x < $this->_grid->getGround('x')){
                    $this->_x = $this->_grid->getGround('x');
                }
                break;
            case 'y':
                $this->_y += ($direction_info['value'] * $this->_speed);
                if ($this->_y > $this->_grid->getTop('y')) {
                    $this->_y = $this->_grid->getTop('y');
                } else if ($this->_y < $this->_grid->getGround('y')){
                    $this->_y = $this->_grid->getGround('y');
                }
                break;
        }
    }
}