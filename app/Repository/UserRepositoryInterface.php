<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;

interface UserRepositoryInterface
{
    /**
     * @param array $attributes
     * @return BaseUser
     */
    public function create(array $attributes = []): Model;
}