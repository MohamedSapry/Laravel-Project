<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
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
            'user_id' => User::factory(),
            'area_id' => Area::factory(),
            'building_number' => $this->faker->buildingNumber(),
            'street_name' => $this->faker->streetName(),
            'floor' => $this->faker->randomDigit(),
            'number_of_apartment' => $this->faker->randomDigit(),
            'defult_address' => $this->faker->boolean()
        ];
    }
}