<?php

require('tree.php');

$tree = new Tree;

$array = [3, 5, 2, 1, 4, 6, 7];
echo implode(" ", $array);
for($i=0; $i<count($array); $i++){
    $tree->addValue($array[$i]);
}

var_dump($tree);

echo $tree->getTreeHeight();

