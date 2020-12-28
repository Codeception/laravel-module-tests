<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Events\TestEvent;
use App\Http\Controllers\TestController;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use App\Utils\Contracts\StringConverterInterface;
use App\Utils\Repeat;
use App\Utils\ToUppercase;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;
use Tests\FunctionalTester;

final class LaravelModuleCest
{
    public function amLoggedAs(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        /** @var array $user */
        $user = $userRepository->create();
        $I->amLoggedAs($user);
        $I->amOnPage('/home');
        $I->see('You are logged in!');
        $I->amOnPage('/');
        $I->seeAuthentication();
    }

    public function amOnAction(FunctionalTester $I)
    {
        $I->amOnAction(TestController::class. '@testValue');
        $I->see('Test value is');
    }

    public function amOnRoute(FunctionalTester $I)
    {
        // TODO
    }

    public function callArtisan(FunctionalTester $I)
    {
        $output = $I->callArtisan('app:create-user', [
            'Name' => 'Jane Doe',
            'Email' => 'jane_doe@gmail.com',
            'Password' => '123456'
        ]);

        $I->seeRecord(User::class, ['email' => 'jane_doe@gmail.com']);
        $I->assertEquals('User created!', $output);
    }

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

    public function disableEvents(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('/fire-event');
        $I->dontSeeRecord(User::class, ['email' => 'johndoe@example.com']);
    }

    public function disableExceptionHandling(FunctionalTester $I)
    {
        // TODO
    }

    public function disableMiddleware(FunctionalTester $I)
    {
        // TODO
    }

    public function disableModelEvents(FunctionalTester $I)
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        /** @var User $user */
        $user = $userRepository->create([
            'email' => 'john_doe@original.com',
            'password' => 'password',
        ]);

        User::saving(function () {
            return false;
        });

        $I->disableModelEvents();

        $user->setEmail('john_doe@updated.com');
        $user->save();

        $I->seeRecord(User::class, ['email' => 'john_doe@updated.com']);
    }

    public function dontSeeAuthentication(FunctionalTester $I)
    {
        $I->amOnPage('/home');
        $I->dontSeeAuthentication();
    }

    public function dontSeeEventTriggered(FunctionalTester $I)
    {
        // With class name
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(TestEvent::class);

        // With event object
        $I->amOnPage('/');
        $I->dontSeeEventTriggered(new TestEvent());
    }

    public function dontSeeFormErrors(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeFormErrors();
    }

    public function dontSeeRecord(FunctionalTester $I)
    {
        $I->disableEvents();

        $I->amOnPage('/fire-event');
        $I->dontSeeRecord(User::class, ['email' => 'johndoe@example.com']);
    }

    public function enableExceptionHandling(FunctionalTester $I)
    {
        // TODO
    }

    public function getApplication(FunctionalTester $I)
    {
        $I->assertInstanceOf(Application::class, $I->getApplication());
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

    public function grabService(FunctionalTester $I)
    {
        $kernel = $I->grabService(Kernel::class);
        $I->assertInstanceOf('App\Http\Kernel', $kernel);
    }

    public function have(FunctionalTester $I)
    {
        // TODO
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

    public function haveMultiple(FunctionalTester $I)
    {
        // TODO
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

    public function haveSingleton(FunctionalTester $I)
    {
        $I->haveSingleton(StringConverterInterface::class, ToUppercase::class);

        $I->amOnPage('/service-container');
        $expected = sprintf("//p[text()='%s']", 'STRING TO CONVERT');
        $I->seeElement($expected);
    }

    public function logout(FunctionalTester $I)
    {
        // TODO
    }

    public function make(FunctionalTester $I)
    {
        // TODO
    }

    public function makeMultiple(FunctionalTester $I)
    {
        // TODO
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

    public function seeInSession(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeInSession('message');
        $I->seeInSession('message', 'My Message');
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

    public function seeSessionHasValues(FunctionalTester $I)
    {
        $I->amOnPage('/session/My%20Message');
        $I->seeSessionHasValues(['message']);
        $I->seeSessionHasValues(['message' => 'My Message']);
    }

    public function setApplication(FunctionalTester $I)
    {
        // TODO
    }
}
