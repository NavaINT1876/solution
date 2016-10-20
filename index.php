<?php

$integerX = 6;

$arrayA = [
    6,
    6,
    1,
    8,
    2,
    3,
    6
];

/**
 * TODO: check in_array of $integerX in $arrayA
 * @param $integerX
 * @param $arrayA
 * @return int
 */
function solution($integerX, $arrayA)
{


    $indexK = 0;
    $elementsAmount = count($arrayA);

    $XElementsAmount = 0;
    foreach ($arrayA as $item) {
        if ($item === $integerX) {
            $XElementsAmount++;
        }
    }

    if ($XElementsAmount == 1 && $integerX == $arrayA[$elementsAmount - 1]) {
        return -1;
    } elseif ($XElementsAmount == 1 && $integerX != $arrayA[$elementsAmount - 1]) {
        return $arrayA[$elementsAmount - 2];
    } else {

    }


    return $XElementsAmount;
}

echo solution($integerX, $arrayA);