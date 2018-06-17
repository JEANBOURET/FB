<?php

ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$tree = new Tree();

$tree->addValue(55);
$tree->addValue(83);
$tree->addValue(35);
$tree->addValue(93);
$tree->addValue(94);

var_dump($tree);

class Node {
    protected $value;
    protected $left;
    protected $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    
    public function addNode($n){
        if($n->value < $this->value){
            if($this->left == null){
                $this->left = $n;
            }else{
                $this->left->addNode($n);
            }
        }else if($n->value > $this->value){
            if($this->right == null){
                $this->right = $n;
            }else{
                $this->right->addNode($n);
            }
        }
    }
}


class Tree{
    public $root;

    public function __construct(){
        $this->root = null;
    }

    public function addValue($value){
        $n = new Node($value);
        if($this->root == null){
            $this->root = $n;
        }else{
            $this->root->addNode($n);    
        }
        
    }

}