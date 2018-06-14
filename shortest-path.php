<?php

function build_distance_table($graph, $source){

    $distance_table = [];

    foreach($graph['vertices'] as $vertice){
        $distance_table[$vertice] = [null, null];
    }

    $distance_table[$source] = [0, $source];

    $queue = [];
    array_push($queue, $source);

    while(count($queue)){
        $current_vertex = array_shift($queue);

        $current_distance = $distance_table[$current_vertext][0];

        foreach(get_adjacent_vertices($graph[$current_vertex]) as $neighbor){
            if(is_null($distance_table[$neighbor][0])){
                $distance_table[$neighbor] = [1 + $current_distance, $current_vertex];
            
                if(count(get_adjacent_vertices($graph[$neighbor])) > 0){
                    $queue.push($neighbor)
                }
            }
        }
    }

    return $distance_table;
}

function shortest_path($graph, $source, $destination){
    $distance_table = build_distance_table($graph, $source);

    $path = [$destination];

    $previous_vertex = $distance_table[$destination][1];

    while($previous_vertex !== null && $previous_vertex !== $source){
        $path = $previous_vertex + $path;
        $previous_vertex = $distance_table[$previous_vertex][1]
    }

    if($previous_vertex is null){
        print "There is no path from $source to $destination";
    }else{
        $path = [$source] + $path;
        print "shortest path is $path";
    }
}

/**
 * need to create graph with adjacency 
 * please visit pluralsight at: 
 * https://app.pluralsight.com/player?course=graph-algorithms-python&author=janani-ravi&name=68e2661d-1376-4a5d-a51e-bc93d4942ee9&clip=4&mode=live
 */