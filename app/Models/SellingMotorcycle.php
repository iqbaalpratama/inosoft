<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class SellingMotorcycle extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'selling_detail_motorcycles';

    protected $fillable = ['buyer_id', 'motorcycle_id', 'quantity'];
}
