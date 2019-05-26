#include <stdio.h>
#include <stdlib.h>

/* Shuffle an array in-place. */
void shuffle(int na, int *a) {
    for (int i = 0; i < na; i++) {
        int j = rand() % (na - i) + i;
        int tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
}

/* Bubblesort an array in-place. */
void bubblesort(int na, int *a) {
    for (int i = 1; i < na; i++) {
        for (int j = i - 1; j >= 0; --j) {
            if (a[j] > a[j + 1]) {
                int tmp = a[j];
                a[j] = a[j + 1];
                a[j + 1] = tmp;
            }
        }
    }
}

int main(int argc, char **argv) {
    int n = atoi(argv[1]);
    int *a = malloc(n * sizeof(a[0]));
    for (int i = 0; i < n; i++)
        a[i] = i;
    shuffle(n, a);
    bubblesort(n, a);
    printf("%d\n", a[0]);
    return 0;
}
