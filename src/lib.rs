use num_bigint::BigUint;
use num_traits::{One, Zero};
use std::ffi::CString;
use std::os::raw::c_char;

fn fibonacci(n: u32) -> BigUint {
    let mut a: BigUint = Zero::zero();
    let mut b: BigUint = One::one();
    for _ in 0..n {
        let temp = a + &b;
        a = b;
        b = temp;
    }
    a
}

#[no_mangle]
pub extern "C" fn fib_c(n: u32) -> *mut c_char {
    let result = fibonacci(n).to_string();
    CString::new(result).unwrap().into_raw()
}

#[no_mangle]
pub extern "C" fn free_str(s: *mut c_char) {
    unsafe {
        if s.is_null() { return; }
        CString::from_raw(s);
    }
}
