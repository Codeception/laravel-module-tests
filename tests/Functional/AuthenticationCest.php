<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Tests\FunctionalTester;

final class AuthenticationCest
{
    public function amActingAs(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create();
        $I->amActingAs($user);

        $I->amOnPage('/home');
        $I->see('You are logged in!');

        $I->amOnPage('/');
        $I->dontSeeAuthentication();
    }

    public function amLoggedAs(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create();
        $I->amLoggedAs($user);

        $I->amOnPage('/home');
        $I->see('You are logged in!');

        $I->amOnPage('/');
        $I->seeAuthentication();
    }

    public function assertAuthenticatedAs(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create();
        $I->amLoggedAs($user);

        $I->assertAuthenticatedAs($user);
    }

    public function assertCredentials(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);

        $I->assertCredentials([
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
    }

    public function assertInvalidCredentials(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);

        $I->assertInvalidCredentials([
            'email' => 'john_doe@gmail.com',
            'password' => '654321'
        ]);
    }

    public function dontSeeAuthentication(FunctionalTester $I)
    {
        $I->amOnPage('/home');
        $I->dontSeeAuthentication();
    }

    public function logout(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
        $I->logout();
        $I->dontSeeAuthentication();
    }

    public function seeAuthentication(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'john_doe@gmail.com',
            'password' => '123456'
        ]);
        $I->amOnPage('/');
        $I->seeRecord(User::class, ['email' => 'john_doe@gmail.com']);

        $I->seeAuthentication();
    }
}
