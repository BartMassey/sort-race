# PHP Quicksort *vs* C Bubblesort Throwdown
Copyright (c) 2019 Bart Massey

I
[borrowed](https://www.codexpedia.com/php/quick-sort-implementation-in-php/)
a PHP implementation of [Quicksort]() (`quicksort.php`) and
wrote my own [Bubblesort]() (`bubblesort.c`) so I could race
'em in response to a [Reddit thread](). Each implementation
creates an array of the first *n* integers, shuffles it, and
then sorts it back.

Turns out the breakeven on my box is about 10,000 elements:
that is the size at which the PHP Quicksort and the C
Bubblesort take roughly the same amount of time.

    $ time php quicksort.php 10000
    0

    real    0m0.054s
    user    0m0.048s
    sys	    0m0.006s
    $ time ./bubblesort 10000
    0

    real    0m0.049s
    user    0m0.049s
    sys     0m0.000s

# License

"MIT". Please see the file `LICENSE` in this distribution
for license terms.
