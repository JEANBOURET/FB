<?php

ini_set('xdebug.var_display_max_depth', 30);

require('Tree.php');
require('Node.php');

$tree = new Tree;

$array = [1, 2, 5, 3, 6, 4];

foreach($array as $key => $value){
    // echo $value;
    $tree->addValue($value);
}

// var_dump($tree);
// $tree->preOrderTraverse();
// $tree->InOrderTraverse();
// $tree->PostOrderTraverse();
// $tree->findNode(6);
$tree->getHeight();