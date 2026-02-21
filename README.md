# Laravel Forum Starter

This repository contains a starter Laravel forum project with:

- Thread listing and detail pages
- Thread creation form
- Reply posting per thread
- Database migrations for `threads` and `posts`

## Quick start

1. Install dependencies:
   ```bash
   composer install
   ```
2. Configure environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Create database tables:
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```
4. Run the app:
   ```bash
   php artisan serve
   ```

Visit `http://127.0.0.1:8000`.

> Note: In this execution environment, external package download may be blocked. If `composer install` fails here, run these commands in a network-enabled environment.
