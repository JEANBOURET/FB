<?php

// $g = new Graph($graph);

breadthFirstSearch('D', 'C');

// class Graph{
//     protected $graph;
//     protected $visited = [];

//     public function __construct($graph){
//         $graph = $graph;
//     }

    function breadthFirstSearch($origin, $destination){

        $graph = [
            'A' => ['B', 'F'],
            'B' => ['A', 'D', 'E'],
            'C' => ['F'],
            'D' => ['B', 'E'],
            'E' => ['B', 'D', 'F'],
            'F' => ['A', 'C', 'E'],
        ];
        
        //set all visited nodes to false
        foreach($graph as $vertex => $adjArray){
            $visited[$vertex] = false;
        }

        //create a queue and push origin into it
        $q = new SplQueue();
        $q->enqueue($origin);

        //set origin as visited in visited list
        $visited[$origin] = true;

        //this path is an array that will contain a vertex as a key and its value will be a dobly linked list
        $path = [];
        $path[$origin] = new SplDoublyLinkedList();
        $path[$origin]->setIteratorMode(
            SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
        );
        $path[$origin]->push($origin);

        while(!$q->isEmpty() && $q->bottom() != $destination){
            
            $currentVertex = $q->dequeue();

            if(!empty($graph[$currentVertex])){
                foreach($graph[$currentVertex] as $neighbor){
                    if(!$visited[$neighbor]){
                        // add neighbor to queue
                        $q->enqueue($neighbor);

                        //set neighbor as visited
                        $visited[$neighbor] = true;

                        //clone current previous node into neighbor key and push neighbor into adjacency list
                        $path[$neighbor] = clone $path[$currentVertex];
                        $path[$neighbor]->push($neighbor);
                    }
                }
            }
        }

        if(isset($path[$destination])) {
            echo "<br>path from $origin to $destination is:<br>";
            $sep = '';
            foreach($path[$destination] as $node){
                echo "$sep$node";
                $sep = '->';
            }
        }else{
            echo "<br>There's no route from $origin to $destination";
        }
    }
// }