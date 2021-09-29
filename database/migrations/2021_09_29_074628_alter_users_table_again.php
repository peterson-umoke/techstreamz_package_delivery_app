<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->boolean('is_online')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('device')->nullable();
            $table->string('ip_address')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
