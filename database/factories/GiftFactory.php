<?php

namespace Database\Factories;

use App\Models\Gift;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(100),
            'pic_url' => 'https://www.snacknation.com/wp-content/uploads/2018/06/pexels-photo-192538.jpeg',
            'price' => $this->faker->numberBetween(23, 95)
        ];
    }
}
