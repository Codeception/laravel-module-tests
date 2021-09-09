<?php

declare(strict_types=1);

namespace Tests\Functional;

use Tests\FunctionalTester;

final class ViewsCest
{
    public function dontSeeFormErrors(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeFormErrors();
    }

    public function seeFormErrorMessage(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->click('button[type=submit]');
        $I->seeFormErrorMessage('name');
        $I->seeFormErrorMessage('name', 'required');
        $I->seeFormErrorMessage('name', 'The name field is required.');
    }

    public function seeFormErrorMessages(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->click('button[type=submit]');

        $I->seeFormErrorMessages(['name' => null, 'email' => null]);

        $I->seeFormErrorMessages(['name' => 'required', 'email' => 'required']);

        $I->seeFormErrorMessages([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.'
        ]);
    }

    public function seeFormHasErrors(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->click('button[type=submit]');
        $I->seeFormHasErrors();
    }
}
