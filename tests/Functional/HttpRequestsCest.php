<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\FunctionalTester;

final class HttpRequestsCest
{
    public function headersFromConfigurationAreUsed(FunctionalTester $I)
    {
        $I->amOnPage('/test-headers');
        $I->see('authorization: Bearer XXX');
        $I->see('foo: Bar');
    }
}
