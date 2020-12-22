<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
    }
}
