<?php

$a = 10;

$f = function () use ($a) {
    echo $a;
};

$f();

