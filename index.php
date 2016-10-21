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

        $equalsAmoult = 0;
        $notEqualsAmount = 0;

        $firstArr = array_chunk($arrayA, ceil($elementsAmount / 2), true)[0];
        $secondArr = array_chunk($arrayA, ceil($elementsAmount / 2), true)[1];

        foreach ($firstArr as $fItem) {
            if ($fItem == $integerX) {
                $equalsAmoult++;
            }
        }

        foreach ($secondArr as $sItem) {
            if ($sItem != $integerX) {
                $notEqualsAmount++;
            }
        }

        if($equalsAmoult == $notEqualsAmount){
            return count($firstArr)-1;
        }

        echo "<pre>";


        print_r($firstArr);
        print_r($secondArr);

        foreach ($arrayA as $element) {
        }


    }


    return $XElementsAmount;
}

echo solution($integerX, $arrayA);