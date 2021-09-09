<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Http\Controllers\TestController;
use Tests\FunctionalTester;

final class RoutingCest
{
    public function amOnAction(FunctionalTester $I)
    {
        $I->amOnAction('TestController@testValue');
        $I->see('Test value is');
    }

    public function amOnRoute(FunctionalTester $I)
    {
        $I->amOnRoute('test-value');
        $I->see('Test value is');
    }

    public function seeCurrentActionIs(FunctionalTester $I)
    {
        $I->amOnPage('/test-value');
        $I->seeCurrentActionIs('TestController@testValue');
    }

    public function seeCurrentRouteIs(FunctionalTester $I)
    {
        $I->amOnAction('TestController@testValue');
        $I->seeCurrentRouteIs('test-value');
    }
}
