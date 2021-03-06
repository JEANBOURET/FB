<?php

$graph = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E'),
    'C' => array('F'),
    'D' => array('B', 'E'),
    'E' => array('B', 'D', 'F'),
    'F' => array('A', 'C', 'E')
);

$g = new Graph($graph);

// least number of hops between D and C
$g->breadthFirstSearch('D', 'C');
// outputs:
// D to C in 3 hops
// D->E->F->C

// least number of hops between B and F
// $g->breadthFirstSearch('B', 'F');
// outputs:
// B to F in 2 hops
// B->A->F

// least number of hops between A and C
// $g->breadthFirstSearch('A', 'C');
// outputs:
// A to C in 2 hops
// A->F->C

// least number of hops between A and G
// $g->breadthFirstSearch('A', 'G');
// outputs:
// No route from A to G

class Graph
{
  protected $graph;
  protected $visited = array();

  public function __construct($graph) {
    $this->graph = $graph;
  }

  // find least number of hops (edges) between 2 nodes
  // (vertices)
  public function breadthFirstSearch($origin, $destination) {
    // mark all nodes as unvisited
    foreach ($this->graph as $vertex => $adjArray) {
      $this->visited[$vertex] = false;
    }

    // create an empty queue
    $q = new SplQueue();

    // enqueue the origin vertex and mark as visited
    $q->enqueue($origin);
    $this->visited[$origin] = true;

    // this is used to track the path back from each node
    $path = array();
    $path[$origin] = new SplDoublyLinkedList();
    var_dump($path);
    $path[$origin]->setIteratorMode(
      SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
    );

    $path[$origin]->push($origin);
    var_dump($path);

    $found = false;
    // while queue is not empty and destination not found
    while (!$q->isEmpty() && $q->bottom() != $destination) {
      $currentVertex = $q->dequeue();

      if (!empty($this->graph[$currentVertex])) {

        // for each adjacent neighbor
        foreach ($this->graph[$currentVertex] as $neighbor) {

          if (!$this->visited[$neighbor]) {
            // if not yet visited, enqueue vertex and mark as visited
            $q->enqueue($neighbor);
            echo "<br>cola:";
            var_dump($q);
           
            $this->visited[$neighbor] = true;

            // add vertex to current path
            $path[$neighbor] = clone $path[$currentVertex];
            
            
            // echo "<br><br>";
            // var_dump($path);
            $path[$neighbor]->push($neighbor);
            echo "<br>path:";
            var_dump($path);
            // break;
            // exit();

          }

        }

      }

    }

    if (isset($path[$destination])) {
      echo "<br>$origin to $destination in ", 
        count($path[$destination]) - 1,
        " hopsn";
      $sep = '';
      foreach ($path[$destination] as $vertex) {
        echo $sep, $vertex;
        $sep = '->';
      }
    }
    else {
      echo "<br>No route from $origin to $destination";
    }
  }
}