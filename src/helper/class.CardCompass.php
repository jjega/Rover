<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 11:33
 */

namespace ProjectNasa;


class CardCompass
{
    private $direction;

    /**
     * Constant value helping to transform cardinal point into coordonate
     * @var array
     */
    private static $TAB_DIR_VAL = array(
        'N' => array('target'=>'y', 'value'=>1),
        'E' => array('target'=>'x', 'value'=>1),
        'S' => array('target'=>'y', 'value'=>-1),
        'W' => array('target'=>'x', 'value'=>-1)
        ) ;

    /**
     * Put the pointer on the current cardinal point
     * @param $dir cardina poiont
     */
    public function setDirection($dir)
    {
        while(key(self::$TAB_DIR_VAL) && (key(self::$TAB_DIR_VAL) !== $dir)) {
            next(self::$TAB_DIR_VAL);
        }
    }

    /**
     * Get Cardinal point initial
     * @return string
     */
    public function getDirectionLabel()
    {
        return key(self::$TAB_DIR_VAL);
    }

    /**
     * Return coordonate information from Cardinal point tab
     * @return mixed
     */
    public function getDirectionInfo()
    {
        return current(self::$TAB_DIR_VAL);
    }

    /**
     * Moving the pointer forward
     * @return mixed
     */
    public function turnRight()
    {
        next(self::$TAB_DIR_VAL);
        if (!current(self::$TAB_DIR_VAL)) {
            reset(self::$TAB_DIR_VAL);
        }

        return current(self::$TAB_DIR_VAL);
    }

    /**
     * Moving the pointer backward
     * @return mixed
     */
    public function turnLeft()
    {
        prev(self::$TAB_DIR_VAL);
        if (!current(self::$TAB_DIR_VAL)) {
            end(self::$TAB_DIR_VAL);
        }

        return current(self::$TAB_DIR_VAL);
    }
}