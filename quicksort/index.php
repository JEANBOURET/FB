<?php

$array = [12, 11, 13, 5, 6, 7, 8];

print "sorted array<br>";
var_dump(quickSort($array, 0, count($array)-1));

function quickSort(&$array, $left, $right){

    if(count($array) < 2) return;

    $pivot = $array[($left + $right)/2];
    var_dump($pivot);
    $l = $left;
    $r = $right;

    while($l <= $r){
        var_dump($l, $r);
        while($array[$l] < $pivot){
            $l++;
        }

        while($array[$r] > $pivot){
            $r++;
        }

        if($l<=$r){
            $temp = $array[$l];
            $array[$l] = $array[$r];
            $array[$r] = $temp;

            $l++;
            $r--;
        }
    }

    if($left<$r){
        quickSort($array, $left, $r);
    }

    if($l<$right){
        quickSort($array, $l, $right);
    }

}