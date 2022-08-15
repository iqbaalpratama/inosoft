<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\SellingMotorcycle;

class SellingMotorcycleRepository{
    protected SellingMotorcycle $sellingMotorcycle;

    public function __construct(SellingMotorcycle $sellingMotorcycle)
    {
        $this->sellingMotorcycle = $sellingMotorcycle;
    }


    public function create(array $data): ?SellingMotorcycle
    {
        $newSellingMotorcycle = new $this->sellingMotorcycle();
        $newSellingMotorcycle->buyer_id = $data['buyer_id'];
        $newSellingMotorcycle->motorcycle_id = $data['motorcycle_id'];
        $newSellingMotorcycle->quantity = $data['quantity'];
        $newSellingMotorcycle->save();
        $motorcycle = $newSellingMotorcycle->motorcycle()->first();
        $motorcycle->stock = $motorcycle->stock - $newSellingMotorcycle->quantity;
        $motorcycle->total_selling = $motorcycle->total_selling + $newSellingMotorcycle->quantity;
        $motorcycle->save();
        return $newSellingMotorcycle->fresh();
    }   
}

?>