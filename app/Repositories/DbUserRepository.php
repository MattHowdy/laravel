<?php

namespace App\Repositories;


class DbUserRepository implements UserRepository
{
    public function create($attribute)
    {
        User::create();
        dd("creating the user");
    }
}