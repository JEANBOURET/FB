<?php

$graph = [];
$arr = [0,1,2,3,4,5];
$len = count($arr);
for($i=0; $i<$len; $i++){
    for($j=0; $j<$len; $j++){
        $graph[$i][$j] = $i == $j ? 0 : PHP_INT_MAX;
    }
}

$graph[0][1] = $graph[1][0] = 10;
$graph[2][1] = $graph[1][2] = 5;
$graph[0][3] = $graph[3][0] = 5;
$graph[3][1] = $graph[1][3] = 5;
$graph[4][1] = $graph[1][4] = 10;
$graph[3][4] = $graph[4][3] = 20;


$distance = shortestPath($graph);
echo "distance is: ".$distance[0][4];

function shortestPath(&$graph){

    $dist = [];
    $dist = $graph;

    $len = count($graph);
    for($k=0; $k<$len; $k++)
        for($i=0; $i<$len; $i++)
            for($j=0; $j<$len; $j++)
            $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$k] + $dist[$k][$j]);
    return $dist;
}
