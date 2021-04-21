<?php
/**
 * Logic gates class containing the available logic gates
 */
class Gate 
{
    /**
     * OR gate, returns true if one of the two inputs is true, else false
     */
    static function or(bool $in0, bool $in1): bool
    {
        return $in0 || $in1;
    }

    /**
     * NOR gate, returns true if both inputs are false, otherwise returns false
     */
    static function nor(bool $in0, bool $in1): bool
    {
        return self::not(self::or($in0, $in1));
    }

    /**
     * AND gate, returns true if both inputs are true, otherwise returns false
     */
    static function and(bool $in0, bool $in1): bool
    {
        return $in0 && $in1;
    }

    /**
     * NAND gate, returns false if both inputs are true, otherwise returns true
     */
    static function nand(bool $in0, bool $in1): bool
    {
        return self::not(self::and($in0, $in1));
    }
    
    /**
     * XOR gate, returns true if one of the two inputs is true, if both are true or none are true it will return false
     */
    static function xor(bool $in0, bool $in1): bool
    {
        return self::and(self::or($in0, $in1), self::nand($in0, $in1));
    }

    /**
     * XNOR gate, returns false if one of the two inputs is true, if both are true or none are true it will return true
     */
    static function xnor(bool $in0, bool $in1): bool
    {
        return self::not(self::xor($in0, $in1));
    }

    /**
     * NOT gate, if input is true it will return false and visa versa
     */
    static function not(bool $in): bool
    {
        return !$in;
    }
}