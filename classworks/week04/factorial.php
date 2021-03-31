<?php

    function factorial($n) {
        if($n == 1) return 1;
        return $n * factorial($n-1);
    }

    function fibonacci($n) {
        if($n <= 1) return $n;
        return fibonacci($n-1) + fibonacci($n-2);
    }

    echo factorial(5);
    echo "<br>";
    for($i=0; $i<5; $i++)
        echo fibonacci($i) ." ";
?>