<?php

namespace Database\Factories;

use App\Models\Celebration;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelebrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Celebration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
