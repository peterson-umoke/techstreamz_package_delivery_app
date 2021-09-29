<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_size_id');
            $table->unsignedBigInteger('good_type_id');
            $table->unsignedBigInteger('delivery_type_id');
            $table->unsignedBigInteger('coupon_id');
            $table->decimal('price', 15)->default('0');
            $table->decimal('discount', 15)->nullable();
            $table->decimal('delivery_fee', 15)->default('0');
            $table->string('is_cash_on_delivery')->default('0');
            $table->decimal('total', 15)->default('0');
            $table->string('item_title')->nullable();
            $table->text('item_description')->nullable();
            $table->dateTime('pickup_datetime');
            $table->string('sender_name')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('sender_location_lat')->nullable();
            $table->string('sender_location_long')->nullable();
            $table->string('sender_location_string')->nullable();
            $table->string('sender_address_detail')->nullable();
            $table->string('receiver_location_lat')->nullable();
            $table->string('receiver_location_long')->nullable();
            $table->string('receiver_location_string')->nullable();
            $table->string('receiver_address_detail')->nullable();
            $table->string('status')->default('pending')->comment('pending, accepted,completed,cancelled,assigned-to-rider');
            $table->string('signature')->nullable();
            $table->text('map')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
