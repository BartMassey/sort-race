#!/bin/bash
make clean
set -x
php --version
time php quicksort.php 10000
gcc --version
clang --version
rustc --version
make
time ./bubblesort-c-gcc 10000
time ./bubblesort-c-clang 10000
time ./bubblesort-rs 10000 17

