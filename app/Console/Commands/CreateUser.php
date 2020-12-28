<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Repository\UserRepositoryInterface;
use Illuminate\Console\Command;

final class CreateUser extends Command
{
    /** @var string */
    protected $signature = 'app:create-user {Name} {Email} {Password}';

    /** @var string */
    protected $description = 'Create a user';

    public function handle(): int
    {
        $name = $this->argument('Name');
        $email = $this->argument('Email');
        $password = $this->argument('Password');

        $userRepository = app()->get(UserRepositoryInterface::class);

        $userRepository->create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $this->line('User created!');

        return Command::SUCCESS;
    }
}
