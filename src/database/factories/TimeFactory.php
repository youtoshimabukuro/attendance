<?php

namespace Database\Factories;

use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance' => $this->faker->date(),
            'leaving' => $this->faker->date(),
            'break' => $this->faker->date(),
            'workTime' => $this->faker->date()
        ];
    }
}
