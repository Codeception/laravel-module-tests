<?php

declare(strict_types=1);

namespace Tests\Functional;

use Illuminate\Contracts\Config\Repository as Config;
use App\Http\Controllers\TestController;
use Tests\FunctionalTester;

final class RoutingCest
{
    public function amOnAction(FunctionalTester $I)
    {
        $I->amOnAction(TestController::class. '@testValue');
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
        $I->seeCurrentActionIs(TestController::class. '@testValue');
        $I->see('Test value is: ' . app()->get(Config::class)->get('test_value'));
    }

    public function seeCurrentRouteIs(FunctionalTester $I)
    {
        $I->amOnAction(TestController::class. '@testValue');
        $I->seeCurrentRouteIs('test-value');
        $I->see('Test value is: ' . app()->get(Config::class)->get('test_value'));
    }
}
