<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Motorcycle;
use App\Models\SellingMotorcycle;

class MotorcycleRepository{
    protected Motorcycle $motorcycle;
    protected SellingMotorcycle $sellingMotorcycle;

    public function __construct(Motorcycle $motorcycle, SellingMotorcycle $sellingMotorcycle)
    {
        $this->motorcycle = $motorcycle;
        $this->sellingMotorcycle = $sellingMotorcycle;
    }

    public function getAll()
    {
        return $this->motorcycle->all();
       
    }

    public function getById(String $id): ?Motorcycle
    {
        $motorcycle = $this->motorcycle::find($id);
        return $motorcycle; 
    }

    public function getByName(String $name): ?array
    {
        $motorcycle = $this->motorcycle::where('name', 'LIKE', '%'.$name.'%')->get()->toArray();
        return $motorcycle; 
    }

    public function getMotorcycleSellingReport(String $id)
    {
        $motorcycle = $this->motorcycle::find($id);
        $motorcycle['selling'] = $this->sellingMotorcycle::where('motorcycle_id', $id)->get()->toArray();
        return $motorcycle; 
    }

    public function create(array $data): Motorcycle
    {
        $newMotorcycle = new $this->motorcycle();
        $newMotorcycle->name = $data['name'];
        $newMotorcycle->stock = $data['stock'];
        $newMotorcycle->price = $data['price'];
        $newMotorcycle->year = $data['year'];
        $newMotorcycle->total_selling = 0;
        $newMotorcycle->machine = $data['machine'];
        $newMotorcycle->suspension_type = $data['suspension_type'];
        $newMotorcycle->transmission_type = $data['transmission_type'];
        $newMotorcycle->save();
        return $newMotorcycle->fresh();
    }
}

?>