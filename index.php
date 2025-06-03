<?php

echo "🎓 Welcome to the Rust-Powered Fibonacci Calculator!\n";
echo "⚙️  Backed by PHP + Rust + BigInt magic!\n\n";

$ffi = FFI::cdef("
    char* fib_c(unsigned int n);
    void free_str(char* s);
", __DIR__ . "/libfiblib.so");

function prompt(string $message): string {
    echo $message;
    return trim(fgets(STDIN));
}

while (true) {
    // Get valid input
    while (true) {
        $input = prompt("🔢 Enter a non-negative integer to calculate fib(n): ");
        
        if (ctype_digit($input)) {
            $n = (int)$input;
            break;
        }

        echo "❌ Invalid input. Please enter a non-negative integer.\n";
    }

    // Call Rust FFI
    $start = microtime(true);
    $resultPtr = $ffi->fib_c($n);
    $result = FFI::string($resultPtr);
    $ffi->free_str($resultPtr);
    $elapsed = round(microtime(true) - $start, 3);

    // Display result
    echo "\n✅ Fibonacci($n) has " . strlen($result) . " digits.\n";
    echo "📈 Computed in {$elapsed} seconds.\n";
    echo "🔍 Result : {$result} \n";

    // Ask to continue
    $again = strtolower(prompt("🔁 Do you want to calculate another? (y/n): "));
    if ($again !== 'y') {
        echo "👋 Bye! Keep exploring and learning. 🚀\n";
        break;
    }

    echo "\n-------------------------------\n";
}
