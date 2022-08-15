<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motorcycle extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'motorcycles';

    protected $fillable = ['name', 'year', 'color', 'price', 'stock', 'machine', 'suspension_type', 'transmission_type', 'total_selling'];
    public function sells()
    {
        return $this->hasMany(SellingMotorcycle::class, 'motorcycle_id', '_id');
    }
}
