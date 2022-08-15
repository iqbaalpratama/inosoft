<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'buyers';

    protected $fillable = ['name', 'phone', 'address'];
}
