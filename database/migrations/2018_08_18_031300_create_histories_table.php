<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');

            $table->text('activity_id');
            $table->string('object');
            // Ngapapain -> predicate + object
            // predicate -> in / out

            $table->text('location');
            $table->bigInteger('money');
            $table->dateTime('datetime');
            $table->text('cause');



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
        Schema::dropIfExists('stories');
    }
}
