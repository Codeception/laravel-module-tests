<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Tests\FunctionalTester;

final class EloquentCest
{
    public function dontSeeRecord(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('/fire-event');
        $I->dontSeeRecord(User::class, ['email' => 'johndoe@example.com']);
    }

    public function grabNumRecords(FunctionalTester $I)
    {
        $numRecords = $I->grabNumRecords(User::class);
        $I->assertSame(1, $numRecords);

        $numRecords = $I->grabNumRecords('users');
        $I->assertSame(1, $numRecords);
    }

    public function grabRecord(FunctionalTester $I)
    {
        $I->haveRecord(User::class, [
            'name' => 'Jane Doe',
            'email' => 'jane_doe@gmail.com',
            'password' => 'password',
            'created_at' => '',
            'updated_at' => '',
        ]);

        // Grab record with table name
        $record = $I->grabRecord('users', ['email' => 'jane_doe@gmail.com']);
        $I->assertTrue(is_array($record));

        // Grab record with model class
        $model = $I->grabRecord(User::class, ['email' => 'jane_doe@gmail.com']);
        $I->assertTrue($model instanceof User);
    }

    public function have(FunctionalTester $I)
    {
        $user = $I->have(User::class, ['email' => 'johndoe@example.com']);

        $I->assertEquals('johndoe@example.com', $user->email);
        $I->seeRecord('users', ['email' => 'johndoe@example.com']);
    }

    public function haveMultiple(FunctionalTester $I)
    {
        $I->haveMultiple(User::class, 3);

        $I->seeNumRecords(4, User::class);
    }

    public function haveRecord(FunctionalTester $I)
    {
        $emails = [
            'users' => 'bonnie@gmail.com',
            User::class => 'clyde@gmail.com'
        ];

        foreach ($emails as $table => $email) {
            $I->haveRecord($table, [
                'name' => 'John Doe',
                'email' => $email,
                'password' => 'password',
                'created_at' => '',
                'updated_at' => ''
            ]);
            $I->seeRecord($table, ['email' => $email]);
        }
    }

    public function make(FunctionalTester $I)
    {
        /** @var Collection $collection */
        $collection = $I->make(User::class, ['email' => 'johndoe@example.com']);

        $I->assertInstanceOf(User::class, $collection->first());
    }

    public function makeMultiple(FunctionalTester $I)
    {
        /** @var Collection $collection */
        $collection = $I->makeMultiple(User::class, 3);

        $I->assertSame(3, $collection->count());
    }

    public function seedDatabase(FunctionalTester $I)
    {
        // TODO
    }

    public function seeNumRecords(FunctionalTester $I)
    {
        $I->seeNumRecords(1,'users');
        $I->seeNumRecords(1,User::class);
    }

    public function seeRecord(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        $userRepository->create([
            'email' => 'jane_doe@gmail.com',
            'password' => '123456'
        ]);

        $I->seeRecord('users', ['email' => 'jane_doe@gmail.com']);
    }
}
