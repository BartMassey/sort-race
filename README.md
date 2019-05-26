# PHP Quicksort *vs* C Bubble Sort Throwdown
Copyright (c) 2019 Bart Massey

I
[borrowed](https://www.codexpedia.com/php/quick-sort-implementation-in-php/)
a PHP implementation of [Quicksort](https://en.wikipedia.org/wiki/Quicksort) (`quicksort.php`) and
wrote my own
[Bubble Sort](https://en.wikipedia.org/wiki/Bubble_sort) in
C (`bubblesort.c`) and comparable Rust (`bubblesort.rs`) so I could race
'em in response to a
[Reddit thread](https://www.reddit.com/r/rust/comments/bsthz6/as_a_backend_developer_how_rust_can_help_me_at_my/eosnd6o/);
(I also wrote a PHP Bubble Sort (`bubblesort.php`) just out
of curiosity: it runs about 100× slower than PHP Quicksort.)
Each implementation of Bubble Sort
creates an array of the first *n* integers, shuffles it, and
then sorts it back.

Turns out the breakeven on my box is about 10,000 elements:
that is the size at which the PHP Quicksort, the C Bubble
Sort compiled with GCC and the Rust Bubble Sort take about
0.05 seconds. The output of the
[benchmark run](benchmark.txt) shows compiler/interpreter
versions and timing.

C Bubble Sort compiled with Clang is about twice as fast: I
suspect it has figured out that it doesn't have to do the
whole sort since it only is printing the first element. Meh.

The standalone Rust Bubble Sort was a pain, since the Rust
Standard Library apparently has no built-in random-number
support. This was super-annoying: I currently require an
extra "seed" argument to this program.

# License

"MIT". Please see the file `LICENSE` in this distribution
for license terms.
