<?php

namespace App\Services;

use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Validator;

class JwtService{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function login($data){
        $token = $this->adminRepository->login($data);
        return $token;
    }

    public function logout(){
        $this->adminRepository->logout();
        return;

    }

    public function refresh(){
        $token = $this->adminRepository->refresh();
        return $token;
    }

    public function data(){
        $data = $this->adminRepository->data();
        return $data;
    }
}