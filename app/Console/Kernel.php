<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\CreateUser;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use function base_path;

final class Kernel extends ConsoleKernel
{
    /** @var array */
    protected $commands = [
        CreateUser::class
    ];

    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
