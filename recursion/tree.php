<?php

$positions = 
[
    'director of engineering' => [
        'technical leader' => [
            'ux developer',
            'sf developer',
            'QA'
        ],
        'leader1' => [
            'leader1s employee1',
            'leader1s employee2',
            'leader1s employee3'
        ],
        'leade21' => [
            'leader2s employee1',
            'leader2s employee2',
            'leader2s employee3'
        ],
        'another leader'
    ],
    'another director'
];

function printTree($array){
    
    foreach($array as $key => $value){
        if(is_array($value)){
            echo $key."<br>";
            printTree($value);
            continue;
        }
        echo "$value<br>";
    }

}

printTree($positions);