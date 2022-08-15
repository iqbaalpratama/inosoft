<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SellingCar extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'selling_detail_cars';

    protected $fillable = ['buyer_id', 'car_id', 'quantity'];
}
