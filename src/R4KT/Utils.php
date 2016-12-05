<?php
namespace R4KT;

class Utils {

    /**
    * Returns the first free key of an array.
    * @return int.
    */
    public static function getFreeKey($array) : int {
        $i = 0;
        while (isset($array[$i])) $i++;
        return $i;
    }
}