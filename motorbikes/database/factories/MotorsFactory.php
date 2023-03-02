<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'company' => $this->faker->randomElement(["Honda","Kawasaki","Suzuki","Yamah"]),
            'kind' => $this->faker->realText($maxNbChars=10),
            'color' => $this->faker->randomElement(["White","Black","Gray","Green","Blue","Red"]),
            'weight' => $this->faker->numberBetween(1000,2500),
            'price' => $this->faker->numberBetween(10000000,250000000),
            'image' => $this->faker->imageUrl(640,480),
            'user_id'=> null,
        ];
    }


}
