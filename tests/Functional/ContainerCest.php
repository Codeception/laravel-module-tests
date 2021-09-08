<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Utils\Contracts\StringConverterInterface;
use App\Utils\Repeat;
use App\Utils\ToUppercase;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;
use Tests\FunctionalTester;

final class ContainerCest
{
    public function clearApplicationHandlers(FunctionalTester $I)
    {
        $I->haveApplicationHandler(function(Application $app): void {
            $config = $app->get(Config::class);
            $config->set('test_value', 15);
        });
        $I->amOnPage('/test-value');
        $I->see('Test value is: 15');

        $I->clearApplicationHandlers();
        $I->amOnPage('/test-value');
        $I->see('Test value is: 5'); // 5 is the default value
    }

    public function getApplication(FunctionalTester $I)
    {
        $I->assertInstanceOf(Application::class, $I->getApplication());
    }

    public function grabService(FunctionalTester $I)
    {
        $kernel = $I->grabService(Kernel::class);
        $I->assertInstanceOf('App\Http\Kernel', $kernel);
    }

    public function haveApplicationHandler(FunctionalTester $I)
    {
        $I->haveApplicationHandler(function(Application $app): void {
            $config = $app->get(Config::class);
            $config->set('test_value', 10);
        });
        $I->amOnPage('/test-value');
        $I->see('Test value is: 10');
    }

    public function haveBinding(FunctionalTester $I)
    {
        $I->haveBinding(StringConverterInterface::class, ToUppercase::class);

        $I->amOnPage('/service-container');
        $expected = sprintf("//p[text()='%s']", 'STRING TO CONVERT');
        $I->seeElement($expected);
    }

    public function haveContextualBinding(FunctionalTester $I)
    {
        $I->haveContextualBinding(
            Repeat::class,
            '$times',
            2 // 3 is the default
        );
        $I->haveBinding(StringConverterInterface::class, Repeat::class);

        $I->amOnPage('/service-container');
        $expected = sprintf("//p[text()='%s']", 'String To ConvertString To Convert');
        $I->seeElement($expected);
    }

    public function haveInstance(FunctionalTester $I)
    {
        $converter = new ToUppercase();
        $I->haveInstance(StringConverterInterface::class, $converter);

        $I->amOnPage('/service-container');
        $expected = sprintf("//p[text()='%s']", 'STRING TO CONVERT');
        $I->seeElement($expected);
    }

    public function haveSingleton(FunctionalTester $I)
    {
        $I->haveSingleton(StringConverterInterface::class, ToUppercase::class);

        $I->amOnPage('/service-container');
        $expected = sprintf("//p[text()='%s']", 'STRING TO CONVERT');
        $I->seeElement($expected);
    }

    public function setApplication(FunctionalTester $I)
    {
        // TODO
    }
}
