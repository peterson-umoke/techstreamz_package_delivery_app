<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\RiderOrder;
use App\Models\RiderUser;

class RiderOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RiderOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'rider_user_id' => RiderUser::factory(),
            'assign_datetime' => $this->faker->dateTime(),
            'rider_response' => $this->faker->word,
            'rider_response_datetime' => $this->faker->dateTime(),
            'user_response' => $this->faker->word,
            'user_response_datetime' => $this->faker->dateTime(),
            'on_the_way_to_pickup' => $this->faker->dateTime(),
            'pickup_datetime' => $this->faker->dateTime(),
            'on_the_way_to_dropoff' => $this->faker->dateTime(),
            'delivered' => $this->faker->dateTime(),
            'notification' => $this->faker->word,
            'admin_response' => $this->faker->word,
            'admin_response_datetime' => $this->faker->dateTime(),
            'map' => $this->faker->text,
        ];
    }
}
