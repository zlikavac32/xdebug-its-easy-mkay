<?php

function a()
{
    return 1;
}

function b($v)
{
    return $v * 2;
}

function c($v)
{
    return $v ** 2;
}

var_dump(c(b(a())));
