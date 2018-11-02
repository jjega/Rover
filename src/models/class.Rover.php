<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 10:42
 */

namespace ProjectNasa;

class Rover implements RoverInterface
{
    private $x;
    private $y;
    private $direction;
    private $speed;
    private $grid;

    public function __construct(Grid $grid, CardCompass $card_compass, int $x, int $y, string $dir, int $speed)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $card_compass;
        $this->direction->setDirection($dir);
        $this->speed = $speed;
        $this->grid = $grid;
    }

    public function getPosition()
    {
        return "{$this->x};{$this->y};{$this->direction->getDirectionLabel()}";
    }

    // Private
    /**
     * @param $rotate
     * @return void
     */
    public function turn(string $rotate)
    {
        if ($rotate === 'R') {
            $this->direction->turnRight();
        } else if ($rotate === 'L') {
            $this->direction->turnLeft();
        }
    }

    /**
     * Applying wich has been settings up
     * @return void
     */
    public function move()
    {
        $direction_info = $this->direction->getDirectionInfo();
        switch ($direction_info['target']) {
            case 'x':
                $this->x += ($direction_info['value'] * $this->speed);
                if ($this->x > $this->grid->getTop('x')) {
                    $this->x = $this->grid->getTop('x');
                } else if ($this->x < $this->grid->getGround('x')){
                    $this->x = $this->grid->getGround('x');
                }
                break;
            case 'y':
                $this->y += ($direction_info['value'] * $this->speed);
                if ($this->y > $this->grid->getTop('y')) {
                    $this->y = $this->grid->getTop('y');
                } else if ($this->y < $this->grid->getGround('y')){
                    $this->y = $this->grid->getGround('y');
                }
                break;
        }
    }
}