<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\FunctionalTester;

final class SessionCest
{
    public function haveInSession(FunctionalTester $I)
    {
        // TODO
    }

    public function seeInSession(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeInSession('message');
        $I->seeInSession('message', 'My Message');
    }

    public function seeSessionHasValues(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeSessionHasValues(['message']);
        $I->seeSessionHasValues(['message' => 'My Message']);
    }
}
