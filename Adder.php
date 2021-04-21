<?php
require_once 'Gate.php';

/**
 * Adder class, will allow two inputs (bools) to add up
 */
class Adder {
    /**
     * Half adder, accepts two bools returns added up
     * $out0 will be true if answer is 1, false if 0 or 2
     * $out1 will be true if answer is 2, false if 0 or 1
     */
    static function half(bool $in0, bool $in1, &$out0, &$out1): void
    {
        $out0 = Gate::xor($in0, $in1);
        $out1 = Gate::and($in0, $in1);
    }

    /**
     * Full adder, accepts two bools and a carrier.
     * Carrier is often $out1 reused.
     * Allows adding up
     */
    static function full(bool $carry, bool $in0, bool $in1, &$out0, &$out1): void
    {
        self::half($in0, $in1, $intern1, $intern2);
        self::half($intern1, $carry, $out0, $intern3);

        $out1 = Gate::or($intern2, $intern3);
    }
}