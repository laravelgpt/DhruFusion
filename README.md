# dhrufusion

# requires
composer require yajra/laravel-datatables-oracle
# Install Command
composer require laravelgpt/dhru

# Run the interactive installer
php artisan dhru:install

# Follow the prompts to select your Laravel version and frontend stack (Blade, Livewire, React, Vue.js)

---

## Security Checklist & Best Practices

- All sensitive routes are protected by authentication and authorization middleware.
- API and admin routes use Laravel's `throttle` middleware for rate limiting.
- Always validate and sanitize all user input (FormRequest and controller validation included).
- Use HTTPS in production and set secure cookie/session flags.
- Store all secrets and credentials in your `.env` file.
- Rotate API keys and monitor logs for suspicious activity.
- Use Laravel Sanctum or Passport for advanced API authentication if needed.
- Keep dependencies up to date (PHP 8.2+, Laravel 10/11/12 supported).

---

# Quick Start

1. Install the package:
   ```bash
   composer require laravelgpt/dhru
   ```
2. Run the interactive installer:
   ```bash
   php artisan dhru:install
   ```
   - Select your Laravel version and frontend stack (Blade, Livewire, React, Vue.js, Inertia.js, API-only)
   - Optionally publish config and run migrations

# Dashboard Integration

## Blade Example
```php
// routes/web.php
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', fn() => view('dhru.admin-dashboard'));
Route::middleware(['auth'])->get('/dashboard', fn() => view('dhru.user-dashboard'));
```

## Livewire Example
- Use the published `admin-dashboard.blade.php` and `user-dashboard.blade.php` as Livewire components or views.

## React/Vue/Inertia.js
- Import the provided dashboard components into your SPA entry points.
- Example (React):
  ```jsx
  import AdminDashboard from './resources/views/dhru/AdminDashboard';
  import UserDashboard from './resources/views/dhru/UserDashboard';
  ```

# Security & Best Practices
- All routes are protected by authentication and authorization middleware.
- Rate limiting is enabled by default.
- See `config/dhru.php` for feature toggles and settings.

---

# Contributors

- laravelgpt
