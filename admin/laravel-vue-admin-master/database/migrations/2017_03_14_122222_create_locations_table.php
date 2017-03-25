<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('locations')) {
            return;
        }
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->json('images');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("locations");
    }
}
