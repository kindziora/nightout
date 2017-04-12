<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('codes')) {
            return;
        }
        Schema::create('codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->boolean('used')->default(0);
            $table->boolean('valid')->default(1);
            $table->integer('promotion_id')->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("codes");
    }
}
