# 🚀 PHP + Rust: BigInt Fibonacci via FFI

This project calculates large Fibonacci numbers in **Rust** using the `num-bigint` crate and calls the function from **PHP** using **FFI** — all inside Docker.

---

## 🔧 What It Does

- Uses Rust to compute `fib(n)` with arbitrary precision
- Exposes the Rust function as a shared library
- PHP calls it via `FFI` extension
- Docker handles everything (no PHP or Rust install needed)

---


## 🔧 Build Instructions

### Step 1: Pulling the image from the repository
 Once in the repository, go to the tag **packages** and copy the docker pull command that will be shown to you.

 ### Step 2: Running the container
  Paste the command you just copied under packages on your terminal.
  Do:
  ```sh
$ docker images
```
This will enable you to see the docker image you just pulled. Copy the Id of the image (the one under `IMAGE ID`) and do:
```sh
$ docker run -it --rm <image/id>
```