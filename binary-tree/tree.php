<?php
ini_set('xdebug.var_display_max_depth', 30);
ini_set('xdebug.var_display_max_children', 2048);
ini_set('xdebug.var_display_max_data', 1024);

class Tree{
    protected $root;
    protected $levels;

    public function __construct(){
        $this->root = null;
        $this->levels = 0;
    }

    public function addValue($value){

        $node = new Node($value);

        if($this->root == null){
            $this->root = $node;
        }else{
            $this->root->addNode($node, $this->root);
        }

    } 

    // function preOrderTraverse(){
    //     $this->root->visitPreOrder($this->root);
    //     return $this->root->getPreOrderedTree();
    // }
    
    // function inOrderTraverse(){
    //     $this->root->visitInOrder($this->root);
    //     return $this->root->getOrderedTree();
    // }

    // function postOrderTraverse(){
    //     $this->root->visitPostOrder($this->root);
    //     return $this->root->getPostOrderedTree();
    // }

    // public function search($value){
    //     $this->root->find($value);
    // }

    public function getTreeHeight(){
        $this->levels = $this->root->calculateHeight($this->root);
        return $this->levels;
    }
}

class Node{
    protected $value;
    protected $left;
    protected $right;
    // protected $preOrderedTree;
    // protected $postOrderedTree;
    // protected $orderedTree;



    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
        // $this->preOrderedTree = [];
        // $this->postOrderedTree = [];
        // $this->orderedTree = [];
    }

    // public function getPreOrderedTree(){
    //     return $this->preOrderedTree;
    // }
    // public function getPostOrderedTree(){
    //     return $this->postOrderedTree;
    // }
    // public function getOrderedTree(){
    //     return $this->orderedTree;
    // }

    public function addNode($node, &$subtree){
        if($subtree == null){
            $subtree = $node;
        }else{
            if($subtree->value > $node->value){
                $this->addNode($node, $subtree->left);
            }else if($subtree->value < $node->value){
                $this->addNode($node, $subtree->right);
            }
        }
    }

    // public function visitPreOrder($node){
    //     if($node->value == null) return;

    //     array_push($this->preOrderedTree, $node->value);

    //     if($node->left != null){
    //         $this->visitPreOrder($node->left);
    //     }
        
    //     if($node->right != null){
    //         $this->visitPreOrder($node->right);
    //     }

    //     if($node->left == null && $node->right == null){
    //         return $this->preOrderedTree;
    //     }
    // }

    // public function visitInOrder($node){

    //     if($node->left != null){
    //         $this->visitInOrder($node->left);
    //     }
        
    //     array_push($this->orderedTree, $node->value);

    //     if($node->right != null){
    //         $this->visitInOrder($node->right); 
    //     }
    // }

    // public function visitPostOrder($node){
    //     if($node->value == null) return;

    //     if($node->left != null){
    //         $this->visitPostOrder($node->left);
    //     }
        
    //     if($node->right != null){
    //         $this->visitPostOrder($node->right);
    //     }

    //     array_push($this->postOrderedTree, $node->value);
    //     if($node->left == null && $node->right == null){
    //         return $this->postOrderedTree;
    //     }
    // }

    // public function find($val){
    //     if($val == $this->value){
    //         echo "node found $val";
    //     }else if($val < $this->value && $this->left != null){
    //         $this->left->find($val);
    //     }else if($val > $this->value && $this->right != null){
    //         $this->right->find($val);
    //     }else{
    //         echo "couldnt find the given value in the tree";
    //     }
    // }

    public function calculateHeight($node){
        if ($node == null) {
            return -1;
        }
    
        $left = $this->calculateHeight($node->left);
        $right = $this->calculateHeight($node->right);
    
        if ($left > $right) {
            return $left + 1;
        } else {
            return $right + 1;
        }
    }
}