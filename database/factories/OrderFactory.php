<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Coupon;
use App\Models\DeliveryType;
use App\Models\GoodType;
use App\Models\Order;
use App\Models\PackageSize;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'package_size_id' => PackageSize::factory(),
            'good_type_id' => GoodType::factory(),
            'delivery_type_id' => DeliveryType::factory(),
            'coupon_id' => Coupon::factory(),
            'price' => $this->faker->randomFloat(0, 0, 999999999999999.),
            'discount' => $this->faker->randomFloat(0, 0, 999999999999999.),
            'delivery_fee' => $this->faker->randomFloat(0, 0, 999999999999999.),
            'is_cash_on_delivery' => $this->faker->word,
            'total' => $this->faker->randomFloat(0, 0, 999999999999999.),
            'item_title' => $this->faker->word,
            'item_description' => $this->faker->text,
            'pickup_datetime' => $this->faker->dateTime(),
            'sender_name' => $this->faker->word,
            'sender_email' => $this->faker->word,
            'sender_phone' => $this->faker->word,
            'receiver_name' => $this->faker->word,
            'receiver_email' => $this->faker->word,
            'receiver_phone' => $this->faker->word,
            'sender_location_lat' => $this->faker->word,
            'sender_location_long' => $this->faker->word,
            'sender_location_string' => $this->faker->word,
            'sender_address_detail' => $this->faker->word,
            'receiver_location_lat' => $this->faker->word,
            'receiver_location_long' => $this->faker->word,
            'receiver_location_string' => $this->faker->word,
            'receiver_address_detail' => $this->faker->word,
            'status' => $this->faker->word,
            'signature' => $this->faker->word,
            'map' => $this->faker->text,
        ];
    }
}
