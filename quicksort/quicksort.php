<?php

function quicksort(array &$arr, $firstIndex, $lastIndex){

    if(count($arr) <= 1) return;

    $pivot = $arr[($firstIndex+$lastIndex)/2];

    $left = $firstIndex;
    $right = $lastIndex;

    while($left <= $right){

        while($arr[$left] < $pivot){
            $left++;
        }

        while($arr[$right] > $pivot){
            $right--;
        }

        if($left <= $right){
            $temp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $temp;
            $left++;
            $right--;
        }
    }

    if($firstIndex < $right){
        quicksort($arr, $firstIndex, $right);
    }
    if($left < $lastIndex){
        quicksort($arr, $left, $lastIndex);
    }

}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92]; 

echo implode(",", $arr);
quicksort($arr, 0, count($arr)-1); 
echo "<br>".implode(",", $arr);