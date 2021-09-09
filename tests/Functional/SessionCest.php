<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\FunctionalTester;

final class SessionCest
{
    public function dontSeeInSession(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->flushSession();
        $I->dontSeeInSession('message', 'My Message');
    }

    public function dontSeeSessionHasValues(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->flushSession();
        $I->dontSeeSessionHasValues(['message']);
        $I->dontSeeSessionHasValues(['message' => 'My Message']);
    }

    public function flushSession(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->flushSession();
        $I->dontSeeInSession('message', 'My Message');
    }

    public function haveInSession(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->seeInSession('message', 'My Message');
    }

    public function seeInSession(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->seeInSession('message');
        $I->seeInSession('message', 'My Message');
    }

    public function seeSessionHasValues(FunctionalTester $I)
    {
        $I->haveInSession(['message' => 'My Message']);
        $I->seeSessionHasValues(['message']);
        $I->seeSessionHasValues(['message' => 'My Message']);
    }
}
