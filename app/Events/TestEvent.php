<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class TestEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
}
