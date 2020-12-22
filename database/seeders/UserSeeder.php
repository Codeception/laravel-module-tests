<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->createOne([
            'name' => 'John Doe',
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
    }
}
