#!/usr/bin/php
# Copyright (c) 2019 Bart Massey
# [This program is licensed under the "MIT License"]
# Please see the file LICENSE in the source
# distribution of this software for license terms.

# Portions of this code taken from
# https://www.codexpedia.com/php/quick-sort-implementation-in-php/

<?php


$n = $argv[1] + 0;

function simple_quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(simple_quick_sort($left), array($pivot), simple_quick_sort($right));
    }
}

$a = range(0, $n);
shuffle($a);
$a = simple_quick_sort($a);
echo $a[0];
echo "\n";
?>
