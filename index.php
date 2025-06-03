<?php

$ffi = FFI::cdef("
    char* fib_c(unsigned int n);
    void free_str(char* s);
", __DIR__ . "/libfiblib.so");

$n = 1000000;
$str = $ffi->fib_c($n);
echo "Fibonacci($n) = " . FFI::string($str) . PHP_EOL;
$ffi->free_str($str);
