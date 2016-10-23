<?php

define('MINIMUM_X', 0);
define('MAXIMUM_X', 100000);

/**
 * An integer X
 */
$integerX = 9;

/**
 * A non-empty zero-indexed array A
 */
$arrayA = [
    12,
    12,
    1,
    10,
    2,
    9,
    13,
    6,
    13,
    3,
    12,
    12
];

/**
 * Function which returns searched index K
 * @param $integerX
 * @param $arrayA
 * @return int
 */
function solution($integerX, $arrayA)
{
    if (!in_array($integerX, $arrayA) || !is_int($integerX) || $integerX < MINIMUM_X || $integerX > MAXIMUM_X) {
        return -1;
    }

    $elementsAmount = count($arrayA);

    $arrayAChunk = array_chunk($arrayA, ceil($elementsAmount / 2), true);

    $firstArr = $arrayAChunk[0];
    $secondArr = $arrayAChunk[1];

    $equalsAmount = array_count_values($firstArr)[$integerX] ?:0;
    $notEqualsAmount = count($secondArr) - array_count_values($secondArr)[$integerX] ?:0;

    if ($equalsAmount != 0 && $equalsAmount == $notEqualsAmount) {
        return count($firstArr);
    } elseif ($equalsAmount < $notEqualsAmount) {
        while ($equalsAmount < $notEqualsAmount) {
            $firstElemOfSecondArr = array_shift($secondArr);
            array_push($firstArr, $firstElemOfSecondArr);
            if ($firstElemOfSecondArr == $integerX) {
                $equalsAmount++;
            } else {
                $notEqualsAmount--;
            }
        }
    } else {
        while ($equalsAmount > $notEqualsAmount) {
            $lastElemOfFirstArr = array_pop($firstArr);
            array_unshift($secondArr, $lastElemOfFirstArr);
            if ($lastElemOfFirstArr != $integerX) {
                $notEqualsAmount++;
            } else {
                $equalsAmount--;
            }
        }
    }

    if ($equalsAmount == 0 || $notEqualsAmount == 0) {
        return -1;
    }

    return count($firstArr);
}

echo solution($integerX, $arrayA);