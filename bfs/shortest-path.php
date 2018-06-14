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
                    array_push($queue, $neighbor);
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

    while(is_null($previous_vertex) && $previous_vertex !== $source){
        $path = $previous_vertex + $path;
        $previous_vertex = $distance_table[$previous_vertex][1];
    }

    if(is_null($previous_vertex)){
        print "There is no path from $source to $destination";
    }else{
        $path = [$source] + $path;
        print "shortest path is $path";
    }
}