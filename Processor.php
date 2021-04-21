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
    static function add(array $in0, array $in1, &$binString, bool &$carry = false): void
    {
        if(($result = count($in0) - count($in1)) != 0) {
            if($result > 0) {
                $in1 = array_merge($in1, array_fill(count($in1), $result, false));
            } else {
                $in0 = array_merge($in0, array_fill(count($in0), $result * -1, false));
            }
        }

        $binArray = [];
        for($i = 0; $i < count($in0); $i++) {
            Adder::full($carry, $in0[$i], $in1[$i], $out0, $carry);
            array_unshift($binArray, $out0 ?: '0');
        }

        $binString = implode('', $binArray);
    }

    /**
     * Subtract class in processor. 
     * Inverts $in1 and sets carry to 1
     * Returns $binString
     */
    static function subtract(array $in0, array $in1, &$binString): void
    {
        $in1 = array_map(function($val) {
            return Gate::not($val);
        }, $in1);

        $carry = true;

        self::add($in0, $in1, $binString, $carry);
    }

    static function multiplier2bit(array $in0, array $in1, &$binString) {
        $binArray = [];

        $out0 = Gate::and($in0[0], $in1[0]);
        array_unshift($binArray, $out0 ?: '0');

        $res0 = Gate::and($in0[0], $in1[1]);
        $res1 = Gate::and($in0[1], $in1[0]);
        $res2 = Gate::and($in0[1], $in1[1]);

        $out1 = Gate::xor($res0, $res1);
        array_unshift($binArray, $out1 ?: '0');

        $res3 = Gate::and($res0, $res1);

        $out2 = Gate::xor($res2, $res3);
        array_unshift($binArray, $out2 ?: '0');
        $out3 = Gate::and($res2, $res3);
        array_unshift($binArray, $out3 ?: '0');

        $binString = implode('', $binArray);
    }
}