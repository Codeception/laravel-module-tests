<?php

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Console Routes

Artisan::command('inspire', function (): void {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
