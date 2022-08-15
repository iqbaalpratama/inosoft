<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class SellingMotorcycle extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'selling_detail_motorcycles';

    protected $fillable = ['buyer_id', 'motorcycle_id', 'quantity'];
    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'motorcycle_id', '_id');
    }
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', '_id');
    }
}
