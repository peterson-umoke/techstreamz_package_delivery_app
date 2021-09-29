<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'last_name')->change();
            $table->string('first_name')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
//        Schema::table('users', function (Blueprint $table) {
//            //
//        });
    }
};
