<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Buyer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'buyers';

    protected $fillable = ['name', 'phone', 'address'];
    public function buyCars()
    {
        return $this->hasMany(SellingCar::class, 'buyer_id', '_id');
    }
    public function buyMotorcycles()
    {
        return $this->hasMany(SellingMotorcycle::class, 'buyer_id', '_id');
    }
}
