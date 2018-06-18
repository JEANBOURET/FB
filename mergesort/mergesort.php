<?php

function mergesort($array){

    $len = count($array);
    $mid = (int) $len/2;
    
    if($len == 1) return $array;

    $left = mergesort(array_slice($array, 0, $mid));
    $right = mergesort(array_slice($array, $mid));

    return merge($left, $right);

}


function merge(array $left, array $right){

    $resultArr = [];
    $countLeft = count($left);
    $countRight = count($right);
    $leftIndex = $rightIndex = 0;

    while($leftIndex < $countLeft && $rightIndex < $countRight){
        if($left[$leftIndex] < $right[$rightIndex]){
            $resultArr[] = $left[$leftIndex];
            $leftIndex++;
        }else{
            $resultArr[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    while($leftIndex < $countLeft){
        $resultArr[] = $left[$leftIndex];
        $leftIndex++;
    }

    while($rightIndex < $countRight){
        $resultArr[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $resultArr;

}

$arr = [1, 14, 3, 7, 4, 5, 15, 6, 13, 10, 11, 2, 12, 8, 9];
$sorted = mergesort($arr);

echo implode(",", $sorted);