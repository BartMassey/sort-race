#!/usr/bin/php
<?php

# Copyright (c) 2019 Bart Massey
# [This program is licensed under the "MIT License"]
# Please see the file LICENSE in the source
# distribution of this software for license terms.

$n = $argv[1] + 0;

function bubble_sort($a)
{
    for($i = 0; $i < count($a); $i++)
    {
        for ($j = $i - 1; $j >= 0; $j--)
        {
            if ($a[$j] > $a[$j + 1])
            {
                $tmp = $a[$j];
                $a[$j] = $a[$j + 1];
                $a[$j + 1] = $tmp;
            }
        }
    }
    return $a;
}

$a = range(0, $n);
shuffle($a);
$a = bubble_sort($a);
echo $a[0];
echo "\n";
?>
