<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'province_id' => 1,
            'name' => "Kota Semarang"
        ]);
        City::create([
            'province_id' => 2,
            'name' => "Kota Bandung"
        ]);
        City::create([
            'province_id' => 3,
            'name' => "Kota Surabaya"
        ]);
    }
}
