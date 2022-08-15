<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Buyer;

class BuyerRepository{

    protected Buyer $buyer;

    public function __construct(Buyer $buyer)
    {
        $this->buyer = $buyer;
    }

    public function getAll()
    {
        return $this->buyer->all();
        
    }

    public function getById(String $id): ?Buyer
    {
        $buyer = $this->buyer::find($id);
        return $buyer; 
    }

    public function getByName(String $name): ?array
    {
        $buyer = $this->buyer::where('name', 'LIKE', '%'.$name.'%')->get()->toArray();
        return $buyer; 
    }

}

?>