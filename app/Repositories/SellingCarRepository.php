<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Car;
use App\Models\SellingCar;

class SellingCarRepository{
    protected SellingCar $sellingCar;

    public function __construct(SellingCar $sellingCar)
    {
        $this->sellingCar = $sellingCar;
    }


    public function create(array $data): ?SellingCar
    {
        $newSellingCar = new $this->sellingCar();
        $newSellingCar->buyer_id = $data['buyer_id'];
        $newSellingCar->car_id = $data['car_id'];
        $newSellingCar->quantity = $data['quantity'];
        $newSellingCar->save();
        $car = $newSellingCar->car()->first();
        $car->stock = $car->stock - $newSellingCar->quantity;
        $car->total_selling = $car->total_selling + $newSellingCar->quantity;
        $car->save();
        return $newSellingCar->fresh();
    }   
}

?>