# 🚀 PHP + Rust: BigInt Fibonacci via FFI

This project calculates large Fibonacci numbers in **Rust** using the `num-bigint` crate and calls the function from **PHP** using **FFI** — all inside Docker.
A fun interactive PHP app using Rust (via FFI) to compute large Fibonacci numbers efficiently.

---

## 🔧 What It Does

- Uses Rust to compute `fib(n)` with arbitrary precision
- Exposes the Rust function as a shared library
- PHP calls it via `FFI` extension
- Docker handles everything (no PHP or Rust install needed)

---


## 🔧 Build Instructions

### Step 1: Pulling the image from the repository
```bash
docker pull freshystar/extended-fib-php
```

 ### Step 2: Running the container
  Paste the command you just copied on your terminal.
  Do:
  ```sh
$ docker images
```
This will enable you to see the docker image you just pulled. Copy the Id of the image (the one under `IMAGE ID`) and do:
```sh
$ docker run -it --rm <image/id>
```