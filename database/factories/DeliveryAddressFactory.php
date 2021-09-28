<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DeliveryAddress;

class DeliveryAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'city' => $this->faker->city,
            'state' => $this->faker->word,
            'country' => $this->faker->country,
            'zip' => $this->faker->postcode,
            'apartment' => $this->faker->word,
            'street' => $this->faker->streetName,
            'instructions' => $this->faker->text,
            'default' => $this->faker->word,
        ];
    }
}
