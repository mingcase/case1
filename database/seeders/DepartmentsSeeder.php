<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Seeder;
class DepartmentsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departments::factory()->count(5)->create();
    }
}
