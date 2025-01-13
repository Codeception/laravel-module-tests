<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Http\Controllers\TestController;
use Illuminate\Contracts\Config\Repository as Config;
use Tests\FunctionalTester;

final class RoutingCest
{
    public function _after(FunctionalTester $I)
    {
        $I->see('Test value is: ' . app()->get(Config::class)->get('test_value'));
    }

    public function amOnAction(FunctionalTester $I)
    {
        $I->amOnAction(TestController::class. '@testValue');
    }

    public function amOnRoute(FunctionalTester $I)
    {
        $I->amOnRoute('test-value');
    }

    public function seeCurrentActionIs(FunctionalTester $I)
    {
        $I->amOnPage('/test-value');
        $I->seeCurrentActionIs(TestController::class. '@testValue');
    }

    public function seeCurrentRouteIs(FunctionalTester $I)
    {
        $I->amOnAction(TestController::class. '@testValue');
        $I->seeCurrentRouteIs('test-value');
    }
}
