<?php

$array = [12, 11, 13, 5, 6, 7, 5];

print "given array: ";
var_dump($array);

print "<br/>sorted array";
var_dump(mergeSort($array));

function mergeSort($array){

    if(count($array) === 1) return $array;

    $middle = floor(count($array)/2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    return merge(
        mergeSort($left),
        mergeSort($right)
    );
}


function merge($left, $right){

    $resultArray = [];

    while(count($left) && count($right)){
        if($left[0] < $right[0]){
            array_push($resultArray, array_shift($left));
        }else{
            array_push($resultArray, array_shift($right));
        }
    }

    while(count($left)){
        array_push($resultArray, array_shift($left));
    }

    while(count($right)){
        array_push($resultArray, array_shift($right));
    }

    return $resultArray;

}