<?php
require_once 'Adder.php';
require_once 'Gate.php';

/**
 * Processor class, processes binary arrays to get results
 */
class Processor {
    /**
     * Add class in processor. Compares two arrays of booleans to get the sum. 
     * Returns carrier and binary string
     */
    static function add(array $in1, array $in2, &$binString, bool &$carry = false): void
    {
        if(($result = count($in1) - count($in2)) != 0) {
            if($result > 0) {
                $in2 = array_merge($in2, array_fill(count($in2), $result, false));
            } else {
                $in1 = array_merge($in1, array_fill(count($in1), $result * -1, false));
            }
        }

        $binArray = [];
        for($i = 0; $i < count($in1); $i++) {
            Adder::full($carry, $in1[$i], $in2[$i], $out1, $carry);
            array_unshift($binArray, $out1 ?: '0');
        }

        $binString = implode('', $binArray);
    }

    /**
     * Subtract class in processor. 
     * Inverts $in2 and sets carry to 1
     * Returns $binString
     */
    static function subtract(array $in1, array $in2, &$binString): void
    {
        $in2 = array_map(function($val) {
            return Gate::not($val);
        }, $in2);

        $carry = true;

        self::add($in1, $in2, $binString, $carry);
    }
}