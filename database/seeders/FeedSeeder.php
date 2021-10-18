<?php

namespace Database\Seeders;

use App\Models\Feed;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feed::factory()->count(rand(1,15))->create();
    }
}
