<?php


function sumNumbers($x, $y)
{
    return $x + $y;
}
function differenceNum($x, $y)
{
    return $x - $y;
}
function multiplicationNum($x, $y)
{
    return $x * $y;
}
function dividingNum($x, $y)
{
    return $x / $y;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'amount':
            return sumNumbers($arg1, $arg2);
            break;
        case 'difference':
            return differenceNum($arg1, $arg2);
            break;
        case 'multiplication':
            return multiplicationNum($arg1, $arg2);
            break;
        case 'dividing':
            return dividingNum($arg1, $arg2);
            break;
    }
};

