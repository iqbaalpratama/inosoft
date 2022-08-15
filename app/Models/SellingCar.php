<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SellingCar extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'selling_detail_cars';

    protected $fillable = ['buyer_id', 'car_id', 'quantity'];
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', '_id');
    }
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', '_id');
    }
}
