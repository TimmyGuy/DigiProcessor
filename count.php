<?php
// The processor class
require_once 'Processor.php';

// Input array of booleans
$input1 = [
    '1' => false,
    '2' => true
];

// Input array of booleans to be sum up by $input1
$input2 = [
    '1' => false,
    '2' => true
];

// Using the processor class to add $input2 by $input1 and get a binary string
Processor::multiplier2bit(array_values($input1), array_values($input2), $binString);

// Displays the result on screen
echo 'Output add -- binString: ' . $binString . PHP_EOL;
echo 'Output add -- Number: ' . bindec($binString) . PHP_EOL;

// Input array of booleans
$input1 = [
    '1' => false,
    '2' => false,
    '4' => false,
    '8' => false,
    '16' => false,
    '32' => true,
    '64' => false,
];

// Input array of booleans to be sum up by $input1
$input2 = [
    '1' => false,
    '2' => true,
    '4' => true,
    '8' => true,
    '16' => false,
    '32' => false,
    '64' => false,
];

// Using the processor class to add $input2 by $input1 and get a binary string
Processor::subtract(array_values($input1), array_values($input2), $binString);

// Displays the result on screen
echo 'Output subtract -- binString: ' . $binString . PHP_EOL;
echo 'Output subtract -- Number: ' . bindec($binString) . PHP_EOL;