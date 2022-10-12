<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'code' => "001",
            'name' => "Branch 1"
        ]);
        Branch::create([
            'code' => "002",
            'name' => "Branch 2"
        ]);
        Branch::create([
            'code' => "003",
            'name' => "Branch 3"
        ]);
    }
}
