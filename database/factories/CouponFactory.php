<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Coupon;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coupon_code' => $this->faker->text,
            'discount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'expiry_date' => $this->faker->date(),
            'type' => $this->faker->word,
            'limit_users' => $this->faker->word,
        ];
    }
}
