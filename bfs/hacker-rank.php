<?php

// Complete the bfs function below.
function bfs($n, $m, $edges, $s) {
    for($i=1; $i<=$n; $i++){
        if($i != $s){
            print breadthFirstSearch($s, $i, $edges)." ";
        }
    }
}

function breadthFirstSearch($origin, $destination, $edges){

        $graph = $edges;
        foreach($graph as $vertex => $adjArray){
            $visited[$vertex] = false;
        }
        $q = new SplQueue();
        $q->enqueue($origin);
        $visited[$origin] = true;
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
                        
                        $q->enqueue($neighbor);
                        $visited[$neighbor] = true;
                        $path[$neighbor] = clone $path[$currentVertex];
                        $path[$neighbor]->push($neighbor);
                    }
                }
            }
        }

    var_dump($path);
        if(isset($path[$destination])) {
            $weight = 0;
            foreach($path[$destination] as $node){
                $weight += 6; 
            }
            return $weight;
        }else{
            return -1;
        }
    }