<?php
ini_set('xdebug.var_display_max_depth', 30);
class Tree{
    public $root;
    public $visited;

    public function __construct(Node $node){
        $this->root = $node;
        $this->visited = new SplQueue;
    }

    public function dfs(Node $node){
        $this->visited->enqueue($node);
       
        if($node->leftChild != null){
            $this->dfs($node->leftChild);
        }
        if($node->rightChild != null){
            $this->dfs($node->rightChild);
        }
    }
}

class Node {
    public $data = null;
    public $leftChild;
    public $rightChild;

    public function __construct($data = null){
        $this->data = $data;
        $this->leftChild = null;
        $this->rightChild = null;
    }

    public function addChild(Node $node){
        if($this->data == null){
            $this->data = $node->data;
        }else{
            if($this->data > $node->data){
                if($this->leftChild == null){
                    $this->leftChild = $node;
                }else{
                    $this->leftChild->addChild($node);
                }
            }else if($this->data < $node->data){
                if($this->rightChild == null){
                    $this->rightChild = $node;
                }else{
                    $this->rightChild->addChild($node);
                }
            }
        }
    }
}

$root = new Node("8");
$tree = new Tree($root);
$nodesArray = ["3", "10", "1", "6", "14", "4", "7", "13"];

foreach($nodesArray as $value){
    $n = new Node($value);
    $tree->root->addChild($n);
}
var_dump($tree);

$tree->dfs($tree->root); 

while(!$tree->visited->isEmpty()){
    $nodeVisited = $tree->visited->dequeue();
    echo "<br>visited: ".$nodeVisited->data;
}
