<?php

namespace App\Services;

use App\Repositories\BuyerRepository;
use App\Repositories\MotorcycleRepository;
use App\Repositories\SellingMotorcycleRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SellingMotorcycleService
{
    protected MotorcycleRepository $motorcycleRepository;
    protected SellingMotorcycleRepository $sellingMotorcycleRepository;
    protected BuyerRepository $buyerRepository;

    public function __construct(MotorcycleRepository $motorcycleRepository, SellingMotorcycleRepository $sellingMotorcycleRepository, BuyerRepository $buyerRepository)
    {
        $this->motorcycleRepository = $motorcycleRepository;
        $this->sellingMotorcycleRepository = $sellingMotorcycleRepository;
        $this->buyerRepository = $buyerRepository;
    }

    public function sellMotorcycle(array $data)
    {
        $validator = Validator::make($data,[
            'quantity' => 'required',
            'motorcycle_id'      => 'required',
            'buyer_id'      => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        if (is_null($this->motorcycleRepository->getById($data['motorcycle_id']))) {
            throw new InvalidArgumentException('Not found motorcycle id');
        }

        if (is_null($this->buyerRepository->getById($data['buyer_id']))) {
            throw new InvalidArgumentException('Not found buyer id');
        }

        if ($this->motorcycleRepository->getById($data['motorcycle_id'])->stock < $data['quantity']) {
            throw new InvalidArgumentException('Not enough stock');
        }

        

        return $this->sellingMotorcycleRepository->create($data);
    }
}