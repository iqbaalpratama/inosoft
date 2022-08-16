<?php

namespace App\Services;

use App\Repositories\AdminRepository;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class AdminService{
    protected AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function register($data){
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'unique:admin,email|required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $user = $this->adminRepository->register($data);
        return $user;
    }
}