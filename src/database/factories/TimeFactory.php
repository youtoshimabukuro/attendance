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
            'user_id'=>$this->faker->numberBetween(1,20),
            'name' => $this->faker->name(),
            'date' => $this->faker->date(),
            'attendance' => $this->faker->time('H:i'),
            'leaving' => $this->faker->time(),
            'breakIn' => $this->faker->time(),
            'breakOut' => $this->faker->time(),
            'workTime' => $this->faker->time()
        ];
    }
}
