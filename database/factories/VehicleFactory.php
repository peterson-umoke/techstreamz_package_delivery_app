<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'vehicle_type_id' => VehicleType::factory(),
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->word,
            'licence_plate' => $this->faker->word,
            'color' => $this->faker->word,
            'lat' => $this->faker->latitude,
            'long' => $this->faker->word,
            'is_online' => $this->faker->boolean,
            'image' => $this->faker->word,
        ];
    }
}
