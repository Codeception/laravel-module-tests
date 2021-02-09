<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function create(array $attributes = []): User
    {
        /** @var User $user */
        $user = User::factory()->createOne($attributes);
        return $user;
    }

    public function save(User $user): void
    {
        $user->save();
    }
}