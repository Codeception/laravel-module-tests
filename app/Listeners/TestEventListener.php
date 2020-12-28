<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Repository\UserRepositoryInterface;

final class TestEventListener
{
    public function handle(): void
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create();
    }
}
