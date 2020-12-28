<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AbstractController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Validation\Factory as Validation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

final class RegisterController extends AbstractController
{
    use RegistersUsers;

    /** @var string */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): Validator
    {
        $validation = app()->get(Validation::class);
        return $validation->make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data): User
    {
        $userRepository = app()->get(UserRepositoryInterface::class);
        return $userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }
}
