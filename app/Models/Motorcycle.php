<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'motorcycles';

    protected $fillable = ['name', 'year', 'color', 'price', 'stock', 'machine', 'suspension_type', 'transmission_type', 'total_selling'];
}
