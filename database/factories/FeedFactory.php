<?php

namespace Database\Factories;

use App\Models\Branches;
use App\Models\Departments;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'static' => $this->faker->boolean(10),
            'notification' => $this->faker->boolean(10),
            'title' => $this->faker->words(rand(1,5),true),
            'description' => $this->faker->words(rand(15,55), true),
            'image' => rand(1,5)>4?$this->faker->imageUrl():null,
            'status' => $this->faker->boolean(90),
            'user_id' => User::all()->random()->id,
            'branch_id' => Branches::all()->random()->id,
            'department_id' => Departments::all()->random()->id
        ];

    }
}
