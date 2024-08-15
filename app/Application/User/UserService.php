<?php

namespace App\Application\User;

use App\Domain\User\User;
use App\Infrastructure\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($name, $email, $password)
    {
        $user = new User(null, $name, $email, bcrypt($password));
        return $this->userRepository->save($user);
    }

    public function findUserByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }
}
