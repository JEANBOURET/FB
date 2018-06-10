<?php

echo "<pre>";
var_dump(spiral(4));
echo "</pre>";

function spiral($n){
	$matrix = array();
	for($i=0; $i<$n; $i++){
		$matrix[$i] = array();
		for($j=0; $j<$n; $j++){
			$matrix[$i][$j] = null;
		}
	}
	
	
	$currentValue = 0;
	$direction = 0;
	$left = 0;
	$right = $n-1;
	$top = 0;
	$bottom = $n-1;
	
	while($currentValue < $n*$n){
		switch($direction % 4){
			case 0:
				for($col=$left; $col<=$right; $col++){
					$matrix[$top][$col] = ++$currentValue;
				}
				$top++;
				$direction++;
			break;
			case 1:
				for($row=$top; $row<=$bottom; $row++){
					$matrix[$row][$right] = ++$currentValue;
				}
				$right--;
				$direction++;
			break;
			case 2:
				for($col=$right; $col>=$left; $col--){
					$matrix[$bottom][$col] = ++$currentValue;
				}
				$bottom--;
				$direction++;
			break;
			default:
				for($row=$bottom; $row>=$top; $row--){
					$matrix[$row][$left] = ++$currentValue;
				}
				$left++;
				$direction++;
			break;
		}
	}
	
	return $matrix;
}

?>