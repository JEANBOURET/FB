<?php

class Node{
    protected $value;
    protected $left;
    protected $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function addNode($node){
        
        if($this->value > $node->value){
            if($this->left == null){
                $this->left = $node;
            }else{
                $this->left->addNode($node);
            }
        }else if($this->value < $node->value){
            if($this->right == null){
                $this->right = $node;
            }else{
                $this->right->addNode($node);
            }
        }        
    }

    public function preOrder($node, &$result){
        if($node->value != null) array_push($result, $node->value);

        if($node->left != null){
            $this->preOrder($node->left, $result);
        }        

        if($node->right != null){
            $this->preOrder($node->right, $result);
        }
    }

    public function inOrder($node, &$inOrderArray){

        if($node->left != null){
            $this->inOrder($node->left, $inOrderArray);
        }

        if($node->value != null) array_push($inOrderArray, $node->value);

        if($node->right != null){
            $this->inOrder($node->right, $inOrderArray);
        }
    }

    public function PostOrder($node, &$postOrderArray){
        if($node->left != null){
            $this->PostOrder($node->left, $postOrderArray);
        }
        
        if($node->right != null){
            $this->PostOrder($node->right, $postOrderArray);
        }
        
        if($node->value != null) array_push($postOrderArray, $node->value);

    }

    public function find($node, $value, &$path){
        if($node->value == $value){
            array_push($path, $node->value);
        }else{
            if($node->left != null){
                array_push($path, $node->left->value);
                $node->find($node->left, $value, $path);
            }
            if($node->right != null){
                array_push($path, $node->right->value);
                $node->find($node->right, $value, $path);
            }
        }
        
    }

    public function height($node){
        if($node == null){
            return -1;
        }

        $left = $this->height($node->left);
        $right = $this->height($node->right);
    
        if($left > $right){
            return $left + 1;
        }else{
            return $right + 1;
        }
    }

}