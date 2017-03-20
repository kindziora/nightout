<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('events')) {
            return;
        }
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->datetime('from');
            $table->datetime('to');
            $table->json('images');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("events");
    }
}
