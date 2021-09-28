<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('metas')):
            Schema::create('metas', function (Blueprint $table) {
                $table->id();
                $table->string('key')->index();
                $table->text('value')->nullable();
                $table->string('type')->default('default');
                $table->string('group')->default('default');
                $table->nullableMorphs('metaable');
                $table->timestamps();
            });
        endif;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metas');
    }
}
