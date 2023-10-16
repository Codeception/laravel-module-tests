<?php

namespace Tests\Functional;

use App\Jobs\SampleJob;
use Illuminate\Support\Facades\Queue;
use Tests\FunctionalTester;

class MiddlewaresCest
{
    public function terminableRouteMiddlewareIsCalled(FunctionalTester $I): void
    {
        Queue::fake();

        $I->amOnPage('/api/ping');

        Queue::assertPushed(SampleJob::class);
    }
}