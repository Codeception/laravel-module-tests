<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\User;

final class TestEventListener
{
    public function handle(): void
    {
        factory(User::class)->create();
    }
}
