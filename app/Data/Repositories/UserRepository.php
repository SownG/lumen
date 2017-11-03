<?php

namespace App\Data\Repositories;

use App\Data\Contract\UserInterface;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserInterface
{
    public function find($id)
    {
        // TODO: Implement find() method.
        return User::find($id);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        return User::all();
    }

    public function createUser($data)
    {
        // TODO: Implement createUser() method.
        $user = new User;
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];

        $user->save();

        return $user;
    }
}