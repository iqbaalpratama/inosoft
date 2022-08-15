<?php

namespace Database\Seeders;

use App\Models\Buyer;
use Illuminate\Database\Seeder;

class BuyersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buyer::create([
            'name' => 'John Doe',
            'phone' => '085121271221',
            'address' => 'Jl. Kebon Kacang No.1 Jakarta Barat'
        ]);

        Buyer::create([
            'name' => 'Sugiyanto',
            'phone' => '08593761282',
            'address' => 'Jl. Letnan No.1 Jakarta Selatan'
        ]);

        Buyer::create([
            'name' => 'Tommy Gunawan',
            'phone' => '082240376122',
            'address' => 'Jl. Tendean 2 Jakarta Selatan'
        ]);
    }
}
