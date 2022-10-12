<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'code' => "001",
            'name' => "Pangkat kehormatan"
        ]);
        Position::create([
            'code' => "002",
            'name' => "Perwira Tinggi"
        ]);
        Position::create([
            'code' => "003",
            'name' => "Perwira Menengah"
        ]);
    }
}
