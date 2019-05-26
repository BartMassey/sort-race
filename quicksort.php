#!/usr/bin/php
<?php

# https://www.codexpedia.com/php/quick-sort-implementation-in-php/

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
