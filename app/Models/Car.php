<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cars';

    protected $fillable = ['name', 'year', 'color', 'price', 'stock', 'machine', 'type', 'passenger_total', 'total_selling'];
    public function sells()
    {
        return $this->hasMany(SellingCar::class, 'car_id', '_id');
    }
}
