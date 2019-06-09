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

fn partition(
    arr: &mut[isize],
    mut left_index: usize,
    mut right_index: usize )
    -> usize
{
    let pivot = arr[(left_index + right_index) / 2];
     
    while left_index <= right_index {        
        while arr[left_index] < pivot {
            left_index += 1;
        }
        while arr[right_index] > pivot {
            right_index -= 1;
        }
        if left_index <= right_index {
            let tmp = arr[left_index];
            arr[left_index] = arr[right_index];
            arr[right_index] = tmp;
            left_index += 1;
            if right_index > 0 {
                right_index -= 1;
            }
        }
    }
    left_index
}
 
fn quicksort(arr: &mut[isize], left_index: usize, right_index: usize) {
    let index = partition(arr, left_index, right_index);
    if left_index + 1 < index {
        quicksort(arr, left_index, index - 1);
    }
    if index < right_index {
        quicksort(arr, index, right_index);
    }
}

#[test]
fn test_quicksort_sorts() {
    let mut a: Vec<isize> = (0..5000).collect();
    shuffle(&mut a, 17);
    let na = a.len();
    quicksort(&mut a, 0, na - 1);
    for i in 1..na {
        assert!(a[i-1] < a[i]);
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
    let na = a.len();
    quicksort(&mut a, 0, na - 1);
    println!("{}", a[0]);
}
