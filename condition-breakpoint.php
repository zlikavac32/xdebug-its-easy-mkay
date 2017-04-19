<?php

function fact($n)
{
    if ($n < 2) {
        return 1;
    }

    return $n * fact($n - 1);
}

var_dump(fact(10));
