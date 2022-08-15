<?php

namespace App\Services;

use App\Repositories\BuyerRepository;

class BuyerService
{
    protected BuyerRepository $buyerRepository;

    public function __construct(BuyerRepository $buyerRepository)
    {
        $this->buyerRepository = $buyerRepository;
    }

    public function getAllBuyer()
    {
        return $this->buyerRepository->getAll();
    }
    public function getBuyerById(String $id)
    {
        return $this->buyerRepository->getById($id);
    }

    public function getBuyerByName(String $name)
    {
        return $this->buyerRepository->getByName($name);
    }
}