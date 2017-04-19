<?php

function throwSomeException()
{
    switch (rand(0, 4)) {
        case 0:
            throw new RuntimeException();
        case 1:
            throw new InvalidArgumentException();
        case 2:
            throw new OutOfBoundsException();
        case 3:
            throw new OutOfRangeException();
        case 4:
            throw new LogicException();
    }
}

throwSomeException();
