#!/usr/bin/php
<?php

# Copyright (c) 2019 Bart Massey
# [This program is licensed under the "MIT License"]
# Please see the file LICENSE in the source
# distribution of this software for license terms.

# Portions of this code taken from
# https://www.codexpedia.com/php/quick-sort-implementation-in-php/

$n = $argv[1] + 0;

function partition(&$arr,$leftIndex,$rightIndex)
{
    $pivot=$arr[($leftIndex+$rightIndex)/2];
     
    while ($leftIndex <= $rightIndex) 
    {        
        while ($arr[$leftIndex] < $pivot)             
                $leftIndex++;
        while ($arr[$rightIndex] > $pivot)
                $rightIndex--;
        if ($leftIndex <= $rightIndex) {  
                $tmp = $arr[$leftIndex];
                $arr[$leftIndex] = $arr[$rightIndex];
                $arr[$rightIndex] = $tmp;
                $leftIndex++;
                $rightIndex--;
        }
    }
    return $leftIndex;
}
 
function quickSort(&$arr, $leftIndex, $rightIndex)
{
    $index = partition($arr,$leftIndex,$rightIndex);
    if ($leftIndex < $index - 1)
        quickSort($arr, $leftIndex, $index - 1);
    if ($index < $rightIndex)
        quickSort($arr, $index, $rightIndex);
}

$a = range(0, $n);
shuffle($a);
quickSort($a, 0, count($a)-1);
echo $a[0];
echo "\n";
?>
