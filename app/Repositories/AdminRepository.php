<?php

namespace App\Repositories;

use App\Models\User;

class AdminRepository{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($data)
    {
        $token = auth('api')->attempt($data);
        return $token;
    }

    public function logout()
    {
        auth('api')->logout();
        return;
    }

    public function refresh()
    {
        $token = auth('api')->refresh();
        return $token;
    }

    public function data()
    {
        $data = auth('api')->user();
        return $data;
    }

    public function register($data)
    {
        $newUser = new $this->user();
        $newUser->name = $data['name'];
        $newUser->email = $data['email'];
        $newUser->password = bcrypt($data['password']);
        $newUser->save();
        return $newUser->fresh();
    }

}