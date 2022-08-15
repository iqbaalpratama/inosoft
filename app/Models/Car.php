<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'cars';

    protected $fillable = ['name', 'year', 'color', 'price', 'stock', 'machine', 'type', 'passenger_total', 'total_selling'];
}
