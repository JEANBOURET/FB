<?php

$graph = [];
$vertexCount = 6;

$graph[1][2] = $graph[2][1] = 1;
$graph[1][5] = $graph[5][1] = 1;
$graph[2][3] = $graph[3][2] = 1;
$graph[2][5] = $graph[5][2] = 1;
$graph[3][4] = $graph[4][3] = 1;
$graph[4][5] = $graph[5][4] = 1;
$graph[4][6] = $graph[6][4] = 1;

$visited = array_fill(1, $vertexCount, 0);

$p = BFS($graph, 1, $visited);
while(!$p->isEmpty()){
    echo $p->dequeue();
}

function BFS(&$graph, $start, $visited){
    $queue = new SplQueue;
    $path = new SplQueue;

    $queue->enqueue($start);
    $visited[$start] = 1;

    while(!$queue->isEmpty()){
        $node = $queue->dequeue();
        $path->enqueue($node);
        foreach($graph[$node] as $key => $vertex){
            if($vertex == 1 && !$visited[$key]){
                $queue->enqueue($key);
                $visited[$key] = 1;
            }
        }
    }

    return $path;
}