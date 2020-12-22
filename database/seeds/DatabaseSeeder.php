<?php

declare(strict_types=1);

use Illuminate\Database\DatabaseManager as DB;
use Illuminate\Database\Schema\Builder as Schema;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->truncateTables(['users']);
        $this->call(UserSeeder::class);
    }

    private function truncateTables(array $tables): void
    {
        $schema = app()->get(Schema::class);
        $database = app()->get(DB::class);

        $schema->disableForeignKeyConstraints();

        foreach ($tables as $table) {
            $database->table($table)->truncate();
        }

        $schema->enableForeignKeyConstraints();
    }
}
