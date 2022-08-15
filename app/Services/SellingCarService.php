<?php

namespace App\Services;

use App\Repositories\BuyerRepository;
use App\Repositories\CarRepository;
use App\Repositories\SellingCarRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SellingCarService
{
    protected CarRepository $carRepository;
    protected SellingCarRepository $sellingCarRepository;
    protected BuyerRepository $buyerRepository;

    public function __construct(CarRepository $carRepository, SellingCarRepository $sellingCarRepository, BuyerRepository $buyerRepository)
    {
        $this->carRepository = $carRepository;
        $this->sellingCarRepository = $sellingCarRepository;
        $this->buyerRepository = $buyerRepository;
    }

    public function sellCar(array $data)
    {
        $validator = Validator::make($data,[
            'quantity' => 'required',
            'car_id'      => 'required',
            'buyer_id'      => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        if (is_null($this->carRepository->getById($data['car_id']))) {
            throw new InvalidArgumentException('Not found car id');
        }

        if (is_null($this->buyerRepository->getById($data['buyer_id']))) {
            throw new InvalidArgumentException('Not found buyer id');
        }

        if ($this->carRepository->getById($data['car_id'])->stock < $data['quantity']) {
            throw new InvalidArgumentException('Not enough stock');
        }
        
        return $this->sellingCarRepository->create($data);
    }
}