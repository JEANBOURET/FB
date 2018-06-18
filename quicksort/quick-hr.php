<?php

$arr = [3, 2, 1];

lilysHomework($arr);

// Complete the lilysHomework function below.
function lilysHomework(&$arr) {
    $r = count($arr);
    $swaps = 0;
    quicksort($arr, 0, $r-1, $swaps);
    
    echo $swaps;
}

function quicksort(&$array, $p, $r, &$swaps){

    if($p < $r){
        $q = partition($array, $p, $r, $swaps);
        quicksort($array, $p, $q, $swaps);
        quicksort($array, $q+1, $r, $swaps);
    }

}

function partition(array &$array, $p, $r, &$swaps){

    $pivot = $array[$p];

    $i = $p-1;
    $j = $r+1;

    do{
        $i++;
    }while($array[$i] < $pivot);
    
    do{
        $j--;
    }while($array[$j] > $pivot);

    if($i < $j){
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
        $i++;
        $j--;
        $swaps++;
    }else{
        return $j;
    }  

}
