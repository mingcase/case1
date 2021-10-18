<?php

namespace Database\Seeders;

use App\Models\Branches;
use Database\Factories\BranchesFactory;
use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branches::factory()->count(5)->create();
    }
}
