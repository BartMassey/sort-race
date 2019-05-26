TARGETS = bubblesort-rs bubblesort-c-gcc bubblesort-c-clang

all: $(TARGETS)

bubblesort-rs: bubblesort.rs
	rustc -O -o bubblesort-rs bubblesort.rs

bubblesort-c-gcc: bubblesort.c
	gcc -O4 -o bubblesort-c-gcc bubblesort.c

bubblesort-c-clang: bubblesort.c
	clang -O3 -o bubblesort-c-clang bubblesort.c

clean:
	-rm -f $(TARGETS)
