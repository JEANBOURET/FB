<?php 

echo fibo(10);

function fibo($n){
    
    if($n<=2){
        return 1;
    }

    return fibo($n-1) + fibo($n-2);

}