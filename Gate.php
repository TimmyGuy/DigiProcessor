<?php
/**
 * Logic gates class containing the available logic gates
 */
class Gate 
{
    /**
     * OR gate, returns true if one of the two inputs is true, else false
     */
    static function or(bool $in1, bool $in2): bool
    {
        return $in1 || $in2;
    }

    /**
     * NOR gate, returns true if both inputs are false, otherwise returns false
     */
    static function nor(bool $in1, bool $in2): bool
    {
        return self::not(self::or($in1, $in2));
    }

    /**
     * AND gate, returns true if both inputs are true, otherwise returns false
     */
    static function and(bool $in1, bool $in2): bool
    {
        return $in1 && $in2;
    }

    /**
     * NAND gate, returns false if both inputs are true, otherwise returns true
     */
    static function nand(bool $in1, bool $in2): bool
    {
        return self::not(self::and($in1, $in2));
    }
    
    /**
     * XOR gate, returns true if one of the two inputs is true, if both are true or none are true it will return false
     */
    static function xor(bool $in1, bool $in2): bool
    {
        return self::and(self::or($in1, $in2), self::nand($in1, $in2));
    }

    /**
     * XNOR gate, returns false if one of the two inputs is true, if both are true or none are true it will return true
     */
    static function xnor(bool $in1, bool $in2): bool
    {
        return self::not(self::xor($in1, $in2));
    }

    /**
     * NOT gate, if input is true it will return false and visa versa
     */
    static function not(bool $in): bool
    {
        return !$in;
    }
}