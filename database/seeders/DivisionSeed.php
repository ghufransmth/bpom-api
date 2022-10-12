<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
            'code' => "001",
            'name' => "A"
        ]);
        Division::create([
            'code' => "002",
            'name' => "B"
        ]);
        Division::create([
            'code' => "003",
            'name' => "C"
        ]);
    }
}
