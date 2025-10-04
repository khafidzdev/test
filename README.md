# MiniShopee - CodeIgniter 3 Demo

A minimal multi-vendor marketplace like Shopee built on CodeIgniter 3.

## Features
- Home page with latest products
- Product listing and detail page
- Cart and checkout stub
- Auth (register/login) with sessions
- Vendor dashboard to create/edit products
- SQLite database with migrations and seed data

## Quickstart (Docker)
```bash
docker compose up --build
# open http://localhost:8080
# Run migrations
curl http://localhost:8080/migrate
```

Seeded user: `vendor@example.com` / `password`

## Local Dev (PHP built-in server)
Requires PHP 7.2+ with sqlite3 extension. If you have Composer:
```bash
composer install
php -S localhost:8000 server.php
# open http://localhost:8000
```

If Composer isn't available, CI3 will fallback to a local `system/` dir if you copy it.

## Environment
- `APP_BASE_URL` (default autodetected)
- `APP_KEY` (set for sessions/security)
- `CI_ENV` (development/production)

## Notes
This is a simplified educational demo, not production ready.
