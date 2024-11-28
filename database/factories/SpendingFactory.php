<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => 1,
            'created_by' => 1,
            'name' => $this->faker->sentence(),
            'amount' => $this->faker->numberBetween(1000, 1000000),
            'used_date' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
            'note' => $this->faker->paragraph(),
        ];
    }
}
