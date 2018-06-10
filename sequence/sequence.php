<?php

printer(10);

function printer($n){
	
	$val = "1";
	
	for($i=1; $i<=$n; $i++){
		echo "$val<br/>";
		$val = calculate($val);
	}
	
}

function calculate($input){
	$input = "$input";
	$count = 1;
	$concat = "";
	$splitted = str_split($input);
	$current = $splitted[0];
	
	if(strlen($input) === 1){
		$concat = "1$current";
		return $concat;
	}

	for($i=1; $i<=strlen($input); $i++){
		
		if($splitted[$i] != $current || $i == strlen($input)){
			$concat .= "$count$current";
			$count = 1;
			$current = $splitted[$i];
		}else{
			$count++;
		}
	}
	
	return $concat;
}