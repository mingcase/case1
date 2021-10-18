<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchesSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeedSeeder::class);
        $this->call(LikeSeeder::class);
    }
}
