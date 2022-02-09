<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName("male"),
            'surname' => $this->faker->lastName(),
            'team_id' => $this->faker->numberBetween(1,6),
        ];
    }
}
