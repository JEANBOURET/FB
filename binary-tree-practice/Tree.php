<?php

class Tree{
    protected $root;
    protected $resultArray;
    protected $inOderArray;
    protected $postOrderArray;
    protected $pathToValue;

    public function __construct(){
        $this->root = null;
        $this->resultArray = [];
        $this->inOrderArray = [];
        $this->postOrderArray = [];
        $this->pathToValue = [];
    }

    public function addValue($value){
        
        $node = new Node($value);

        if($this->root == null){
            $this->root = $node;
        }else{
            $this->root->addNode($node);
        }
    }

    public function getResultArray(){
        return $this->resultArray;
    }

    public function preOrderTraverse(){
        $this->root->preOrder($this->root, $this->resultArray);
        
        echo "<br>Pre Order Traverse: ".implode(" ", $this->resultArray);
    }

    public function InOrderTraverse(){
        $this->root->inOrder($this->root, $this->inOrderArray);
        echo "In Order Traverse :".implode(" ", $this->inOrderArray);
    }

    public function PostOrderTraverse(){
        $this->root->postOrder($this->root, $this->postOrderArray);
        echo "<br>Post Order Traverse: ".implode(" ", $this->postOrderArray);
    }

    public function findNode($destination){
        $this->root->find($this->root, $destination, $this->pathToValue);
        echo "<br>Path to destination: ".implode('->', $this->pathToValue);
    }

    public function getHeight(){
        echo "Height of tree is: ".$this->root->height($this->root);
    }
}