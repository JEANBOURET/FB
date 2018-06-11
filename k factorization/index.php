<?php

$arr = array(2, 4, 6, 9, 3, 7, 16, 10, 5);

var_dump(calculateIterations(72,$arr));

// 2 3 4 5 6 7 9 10 16  

function calculateIterations($n, $arr){
	sort($arr);
	$listIndex = 0;
	$backCounter = 2;
	$times = 0;
	
	while($times < count($arr)){
		$list = [];
		$tempArray = $arr;
		array_splice($tempArray, $times, 1);
		echo "<br>Se reinicia el array<br>";
		
		for($i=0; $i<count($tempArray); $i++){
			
			$list[$listIndex] = $tempArray[$i];
			
			echo "lista actual: ";
			var_dump($list);
			echo "<br>i: ".$i." total: ".array_product($list).
			" list index: ".$listIndex."<br>";
			
			$listIndex++;
			
			if(array_product($list)>$n){
				array_splice($list, $i-1);
				unset($tempArray[$i-1]);
				echo "<br>array original modificado: ";
				var_dump($tempArray);
				echo "<br>";
				$listIndex = count($list);
				$i--;
			}else{
				if(array_product($list) == $n){
					echo "<br>llegamos al numero<br>";
					var_dump($list);
					echo "<br>";
					$result = array_product($list);
					$times = count($arr);
					break;
				}
			}	
		}
		
		$times++;
	}
	
	return ($result == -1) ? $result : $list;

}