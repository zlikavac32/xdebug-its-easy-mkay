<?php

function usedAllOverTheCode($var)
{
    $ret = $var * $var;

    return $ret;
}

usedAllOverTheCode(1);
usedAllOverTheCode(2);
usedAllOverTheCode(3);

function usedOnceButHasBug()
{
    usedAllOverTheCode(4);
}

usedOnceButHasBug();
