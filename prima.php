<?php

    function prima($n) {
        if ($n <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }

        return true;
    }

    for ($i = 1; $i <= 100; $i++) {
        if (prima($i)) {
            echo " $i adalah bilangan prima<br>";
        }
    }
?>
 