# Stage 1: Compile Rust shared lib
FROM rust:1.84.0-slim AS builder

RUN apt-get update && apt-get install -y build-essential pkg-config \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . .

RUN cargo build --release
RUN strip target/release/libfiblib.so

# Stage 2: Final PHP CLI runtime with FFI
FROM php:8.2-cli

RUN apt-get update && apt-get install -y libffi-dev \
 && docker-php-ext-install ffi \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY --from=builder /app/target/release/libfiblib.so /app/
COPY index.php /app/

ENTRYPOINT ["php", "/app/index.php"]