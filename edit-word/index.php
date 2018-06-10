<?php

var_dump(one_edit_apart("cat", "act"));

function one_edit_apart($str1, $str2){
    if(strlen($str1) <= 0 || strlen($str2) <= 0){
        echo "both strings should contain at least on 1 letter";
        exit();
    }
    
    $diffs = 0;
    if(strlen($str1) == strlen($str2)){
        for($i=0; $i<strlen($str1); $i++){
            if($str1[$i] != $str2[$i]){
                $diffs++;
            }
        }
    }else{
        $longerStr = (strlen($str1) > strlen($str2)) ? $str1 : $str2;
        $shorterStr = (strlen($str1) > strlen($str2)) ? $str2 : $str1;
    
		$prevIndex = 0;
        for($i = 0; $i<strlen($longerStr); $i++){
			
            if($longerStr[$i] != $shorterStr[$i-$prevIndex]){
                $diffs++;
                $prevIndex = 1;
            }
        }
    }
        
    return ($diffs <= 1);
}