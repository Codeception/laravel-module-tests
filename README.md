# Codeception Laravel Module Tests

[![Actions Status](https://github.com/Codeception/laravel-module-tests/workflows/CI/badge.svg)](https://github.com/Codeception/laravel-module-tests)

Minimal site containing functional tests for [Codeception Module Laravel](https://github.com/Codeception/module-laravel).

## Usage

The main purpose of this project is to verify the proper functioning of the `Codeception Module Laravel` in a minimal Laravel installation.

You can use it to contribute new features or propose changes in the module and verify that nothing is broken in the process.
If that's your goal, be sure to follow [the contribution guides](https://github.com/Codeception/module-laravel/blob/main/CONTRIBUTING.md) for the module.

You can also **fork it** and use it to reproduce a bug or unexpected behavior for analysis.
If that's your case, just add a link to your fork next to the description of your issue in the module's repository.

Lastly, if you just want to see the module in action and run the tests yourself on your local machine just:

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

Then, go to the project directory and run:

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

