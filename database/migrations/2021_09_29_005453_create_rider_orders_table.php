<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('assign_datetime')->nullable();
            $table->string('rider_response')->default('pending');
            $table->dateTime('rider_response_datetime');
            $table->string('user_response')->default('accept');
            $table->dateTime('user_response_datetime');
            $table->dateTime('on_the_way_to_pickup');
            $table->dateTime('pickup_datetime');
            $table->dateTime('on_the_way_to_dropoff');
            $table->dateTime('delivered');
            $table->string('notification')->nullable();
            $table->string('admin_response')->default('accept');
            $table->dateTime('admin_response_datetime');
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
        Schema::dropIfExists('rider_orders');
    }
}
