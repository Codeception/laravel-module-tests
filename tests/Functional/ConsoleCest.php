<?php

declare(strict_types=1);

namespace Tests\Functional;

use App\Models\User;
use Tests\FunctionalTester;

final class ConsoleCest
{
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
}
