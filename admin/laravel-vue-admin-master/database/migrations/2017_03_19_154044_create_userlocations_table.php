<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('user_locations')) {
            return;
        }
        Schema::create('user_locations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("user_locations");
    }
}
