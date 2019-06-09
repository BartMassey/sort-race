#!/bin/bash
N=5000
M=1000000
make clean
set -x
php --version
time php quicksort.php $N
time php quicksort-inplace.php $N
gcc --version
clang --version
rustc --version
make
time ./bubblesort-c-gcc $N
time ./bubblesort-c-clang $N
time ./bubblesort-rs $N 17
time ./quicksort-rs $N 17
time php quicksort-inplace.php $M
time ./quicksort-rs $M 17
