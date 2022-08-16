<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Car;
use App\Models\SellingCar;

class CarRepository{

    protected Car $car;
    protected SellingCar $sellingCar;

    public function __construct(Car $car, SellingCar $sellingCar)
    {
        $this->car = $car;
        $this->sellingCar = $sellingCar;
    }

    public function getAll()
    {
        return $this->car->all();
        
    }

    public function getById(String $id): ?Car
    {
        $car = $this->car::find($id);
        return $car; 
    }

    public function getByName(String $name): ?array
    {
        $car = $this->car::where('name', 'LIKE', '%'.$name.'%')->get()->toArray();
        return $car; 
    }

    public function getCarSellingReport(String $id)
    {
        $car = $this->car::find($id);
        $car['selling'] = $this->sellingCar::where('car_id', $id)->get()->toArray();
        return $car; 
    }

    public function create(array $data): Car
    {
        $newCar = new $this->car();
        $newCar->name = $data['name'];
        $newCar->stock = $data['stock'];
        $newCar->price = $data['price'];
        $newCar->year = $data['year'];
        $newCar->total_selling = 0;
        $newCar->machine = $data['machine'];
        $newCar->type = $data['type'];
        $newCar->passenger_total = $data['passenger_total'];
        $newCar->save();
        return $newCar->fresh();
    }   
}

?>