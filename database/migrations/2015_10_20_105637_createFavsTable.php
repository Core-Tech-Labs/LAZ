<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favs', function(Blueprint $table){
            $table->increments('id');
            $table->integer('favoritee_id')->index();
            $table->integer('favorited_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favs', function(Blueprint $table){
            Schema::drop('favs');
        });
    }
}
