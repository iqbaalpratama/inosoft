<?php

namespace App\Services;

use App\Repositories\MotorcycleRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class MotorcycleService
{
    protected MotorcycleRepository $motorcycleRepository;

    public function __construct(MotorcycleRepository $motorcycleRepository)
    {
        $this->motorcycleRepository = $motorcycleRepository;
    }

    public function getAllMotorcycle()
    {
        return $this->motorcycleRepository->getAll();
    }
    
    public function getMotorcycleById(String $id)
    {
        return $this->motorcycleRepository->getById($id);
    }

    public function getMotorcycleByName(String $name)
    {
        return $this->motorcycleRepository->getByName($name);
    }

    public function saveMotorcycle(array $data)
    {
        $validator = Validator::make($data,[
            'name' => 'required|max:256',
            'price'      => 'required|numeric',
            'stock'      => 'required|numeric',
            'year'      => 'required|numeric',
            'suspension_type'  => 'required',
            'machine'      => 'required',
            'transmission_type' => 'required',
            'color'      => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->motorcycleRepository->create($data);
    }
}