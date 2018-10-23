<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 14/10/2018
 * Time: 10:40
 */

namespace ProjectNasa;

class Grid
{
    // Grid size Can only be R+ representing absciss and ordonate max value
    private $_top_x;
    private $_top_y;

    // If the absciss and ordonate lower value
    private $_ground_x;
    private $_ground_y;

    private static $_instance;

    /**
     * Grid constructor. Part of mars which will be visited. Because it is unique we need to create a Singleton
     * @param int $top_x Maximum value for absciss
     * @param int $top_y Maximum value for ordonate
     * @param int $ground_x Minimmum value for absciss
     * @param int $ground_y Minimmum value for ordonate
     */
    private function __construct(int $top_x, int $top_y, int $ground_x, int $ground_y)
    {
        $this->_top_x = $top_x;
        $this->_top_y = $top_y;
        $this->_ground_x = $ground_x;
        $this->_ground_y = $ground_y;
    }

    /**
     * Returning the max value according to $axe
     * @param $axe x|y
     * @return integer $_top_x|$_top_y
     */
    public function getTop($axe) {
        return $this->{'_top_' . $axe};
    }

    /**
     * Returning the min value according to $axe
     * @param $axe
     * @return mixed
     */
    public function getGround($axe) {
        return $this->{'_ground_' . $axe};
    }

    /**
     *  All Rovers are one the same grid
     * @param int|null $top_x
     * @param int|null $top_y
     * @param int $ground_x
     * @param int $ground_y
     * @return bool|Grid intance of Grid
     */
    public static function getInstance(int $top_x = null, int $top_y = null, $ground_x = 0, $ground_y = 0) {
        if (is_null(self::$_instance)) {
            try {
                self::$_instance = new Grid($top_x, $top_y, intval($ground_x), intval($ground_y));
            } catch (\Exception $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        return self::$_instance;
    }
}