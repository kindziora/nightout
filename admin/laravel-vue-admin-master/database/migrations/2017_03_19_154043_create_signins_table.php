<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSigninsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('signins')) {
            return;
        }
        Schema::create('signins', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->datetime('checkin_at')->nullable();
           
            $table->integer('validated_by_user_id')->unsigned()->nullable();
            $table->foreign('validated_by_user_id')->references('id')->on('users');
            
            $table->integer('promotion_code_id')->unsigned()->nullable();
            $table->foreign('promotion_code_id')->references('id')->on('codes');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop("signins");
    }
}
