/*
 * Copyright (c) 2019 Bart Massey
 * [This program is licensed under the "MIT License"]
 * Please see the file LICENSE in the source
 * distribution of this software for license terms.
 */

/* Terrible PRNG to avoid the rand crate here. */
fn rand(r: &mut usize) {
    // https://en.wikipedia.org/wiki/Linear_congruential_generator#Parameters_in_common_use (Newlib, Musl)
    *r = r.wrapping_add(1).wrapping_mul(6364136223846793005);
}

/* Shuffle an array in-place. */
fn shuffle(a: &mut[isize], mut r: usize) {
    let na = a.len();
    for i in 0..na {
        rand(&mut r);
        let j = r % (na - i) + i;
        a.swap(i, j);
    }
}

/* Bubblesort an array in-place. */
fn bubblesort(a: &mut [isize]) {
    for i in 0..a.len() {
        for j in (0..i).rev() {
            if a[j] > a[j + 1] {
                a.swap(j, j + 1);
            }
        }
    }
}

fn main() {
    let ns: Vec<isize> = std::env::args()
        .skip(1)
        .map(|s| s.parse().unwrap())
        .collect();
    let n = ns[0];
    let r = ns[1] as usize;
    let mut a: Vec<isize> = (0..n).collect();
    shuffle(&mut a, r);
    bubblesort(&mut a);
    println!("{}", a[0]);
}
