<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $attributes = []): User;

    public function save(User $user): void;
}