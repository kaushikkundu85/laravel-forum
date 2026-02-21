# Laravel Forum Starter

This repository contains a Laravel forum starter with:

- Thread listing/detail pages with pagination
- Thread creation and replies with dedicated Form Request validation
- Seed data factories for fast local demo content
- Feature tests for primary forum flows

## Quick start (MySQL)

1. Install dependencies:
   ```bash
   composer install
   ```
2. Configure environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Create a MySQL database:
   ```sql
   CREATE DATABASE laravel_forum CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
4. Update your `.env` credentials if needed:
   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_forum
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Run tests:
   ```bash
   php artisan test
   ```
7. Run the app:
   ```bash
   php artisan serve
   ```

Visit `http://127.0.0.1:8000`.

## Forum behavior

- Home redirects to thread list.
- Threads are ordered newest-first and paginated.
- Replies on thread detail are also paginated.
- Validation errors are shown in a global error panel.

## Optional: sqlite for local quick testing

If you prefer sqlite locally, switch your `.env` to:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

Then run:

```bash
touch database/database.sqlite
php artisan migrate --seed
```

> Note: If package download is blocked in your environment, run setup commands from a machine with access to Packagist.
