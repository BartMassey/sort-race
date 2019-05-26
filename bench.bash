#!/bin/bash
N=5000
make clean
set -x
php --version
time php quicksort.php $N
gcc --version
clang --version
rustc --version
make
time ./bubblesort-c-gcc $N
time ./bubblesort-c-clang $N
time ./bubblesort-rs $N 17

