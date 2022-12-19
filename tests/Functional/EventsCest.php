<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Events\TestEvent;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Tests\FunctionalTester;

final class EventsCest
{
    public function disableEvents(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('/fire-event');
        $I->dontSeeRecord(User::class, ['email' => 'johndoe@example.com']);
    }

    public function disableModelEvents(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $user = $userRepository->create([
            'email' => 'john_doe@original.com',
            'password' => 'password',
        ]);

        User::saving(fn() => false);

        $I->disableModelEvents();

        $user->setEmail('john_doe@updated.com');
        $userRepository->save($user);

        $I->seeRecord(User::class, ['email' => 'john_doe@updated.com']);
    }

    public function dontSeeEventTriggered(FunctionalTester $I)
    {
        // With class name
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(TestEvent::class);
        $I->seeNumRecords(1, User::class);

        // With event object
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(new TestEvent());
        $I->seeNumRecords(1, User::class);
    }

    public function seeEventTriggered(FunctionalTester $I)
    {
        $I->amOnPage('/fire-event');
        $I->seeNumRecords(2, User::class);

        // With class name
        $I->seeEventTriggered(TestEvent::class);

        // With event object
        $I->amOnPage('/fire-event');
        $I->seeEventTriggered(new TestEvent());

        // With events array
        $I->amOnPage('/fire-event');
        $I->seeEventTriggered([TestEvent::class, TestEvent::class]);

        // When events are disabled
        $I->disableEvents();
        $I->amOnPage('/fire-event');
        $I->seeEventTriggered(TestEvent::class);
    }
}
