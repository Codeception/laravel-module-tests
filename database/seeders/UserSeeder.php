<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create([
            'name' => 'John Doe',
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
    }
}
