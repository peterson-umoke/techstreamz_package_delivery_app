<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTable extends Migration
{
    public function up()
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type')->default('default');
            $table->string('group')->default('default');

            $table->string('key')->index();
            $table->text('value')->nullable();

            $table->nullableMorphs('metaable');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meta');
    }
}
