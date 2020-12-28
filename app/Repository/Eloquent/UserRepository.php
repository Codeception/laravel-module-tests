<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

final class UserRepository implements UserRepositoryInterface
{
    /**
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes = []): Model
    {
        return User::factory()->createOne($attributes);
    }
}