<?php
require_once 'Gate.php';

/**
 * Adder class, will allow two inputs (bools) to add up
 */
class Adder {
    /**
     * Half adder, accepts two bools returns added up
     * $out1 will be true if answer is 1, false if 0 or 2
     * $out2 will be true if answer is 2, false if 0 or 1
     */
    static function half(bool $in1, bool $in2, &$out1, &$out2): void
    {
        $out1 = Gate::xor($in1, $in2);
        $out2 = Gate::and($in1, $in2);
    }

    /**
     * Full adder, accepts two bools and a carrier.
     * Carrier is often $out2 reused.
     * Allows adding up
     */
    static function full(bool $carry, bool $in1, bool $in2, &$out1, &$out2): void
    {
        self::half($in1, $in2, $intern1, $intern2);
        self::half($intern1, $carry, $out1, $intern3);

        $out2 = Gate::or($intern2, $intern3);
    }
}