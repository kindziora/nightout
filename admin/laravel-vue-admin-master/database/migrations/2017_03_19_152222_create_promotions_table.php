<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['attendee', 'price', 'product', 'other'])->default('attendee');
            $table->json('images');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("promotions");
    }
}