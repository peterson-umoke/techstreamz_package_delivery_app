<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Coupon;
use App\Models\CouponUsed;
use App\Models\Order;
use App\Models\User;

class CouponUsedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CouponUsed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'user_id' => User::factory(),
            'coupon_id' => Coupon::factory(),
        ];
    }
}
