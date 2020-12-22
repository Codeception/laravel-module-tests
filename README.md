# Codeception Laravel Module Tests

[![Actions Status](https://github.com/Codeception/laravel-module-tests/workflows/CI/badge.svg)](https://github.com/Codeception/laravel-module-tests)

Minimal site containing functional tests for [Codeception Module Laravel](https://github.com/Codeception/module-laravel).

## Installation

1. Clone the repo:
   ```shell
   git clone https://github.com/Codeception/laravel-module-tests.git
   ```
2. Install Composer dependencies:
   ```shell
   composer update
   ```
3. Create your `.env` file from the `.env.testing` file.
4. Create the database file: `database/database.sqlite`.
5. Update database schema and load seeders:
   ```shell
   php artisan migrate --seed
   ```

## Usage

```shell
vendor/bin/codecept run Functional
```

### Create Unit Suite or Acceptance Suite

To create [Unit Tests](https://codeception.com/docs/05-UnitTests) or [Acceptance Tests](https://codeception.com/docs/03-AcceptanceTests), you need to create the corresponding suite first:
```shell
vendor/bin/codecept generate:suite Unit
vendor/bin/codecept generate:suite Acceptance
```
<hr/>

> Credits to [Jan-Henk Gerritsen](https://github.com/janhenkgerritsen) for his work on [janhenkgerritsen/codeception-laravel5-sample](https://github.com/janhenkgerritsen/codeception-laravel5-sample), which served as the inspiration for this project.

