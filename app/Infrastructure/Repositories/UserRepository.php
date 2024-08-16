<?php

namespace App\Infrastructure\Repositories;

use App\Domain\User\User;
use App\Models\User as EloquentUser;

class UserRepository
{
    public function save(User $user)
    {
        $eloquentUser = new EloquentUser();
        $eloquentUser->name = $user->name;
        $eloquentUser->email = $user->email;
        $eloquentUser->password = $user->password;
        $eloquentUser->save();
        return $eloquentUser;
    }

    public function findByEmail($email)
    {
        return EloquentUser::where('email', $email)->first();
    }
}
