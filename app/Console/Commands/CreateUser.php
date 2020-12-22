<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Hashing\Hasher;

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

        $hasher = app()->get(Hasher::class);

        User::factory()->createOne([
            'name' => $name,
            'email' => $email,
            'password' => $hasher->make($password)
        ]);

        $this->line('User created!');

        return Command::SUCCESS;
    }
}
