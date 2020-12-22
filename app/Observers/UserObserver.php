<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

final class UserObserver
{
    public function saving(User $user): void
    {
        $hasher = app()->get(Hasher::class);

        if (!$hasher->needsRehash($user->getPassword())) {
            return;
        }

        $user->setPassword(
            $hasher->make($user->getPassword())
        );
    }
}
