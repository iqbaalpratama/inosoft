<?php

namespace App\Services;

use App\Repositories\CarRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CarService
{
    protected CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getAllCar()
    {
        return $this->carRepository->getAll();
    }
    public function getCarById(String $id)
    {
        return $this->carRepository->getById($id);
    }

    public function getCarByName(String $name)
    {
        return $this->carRepository->getByName($name);
    }

    public function saveCar(array $data)
    {
        $validator = Validator::make($data,[
            'name' => 'required|max:256',
            'price'      => 'required|numeric',
            'stock'      => 'required|numeric',
            'year'      => 'required|numeric',
            'passenger_total'  => 'required|numeric',
            'machine'      => 'required',
            'type'      => 'required',
            'color'      => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->carRepository->create($data);
    }
}