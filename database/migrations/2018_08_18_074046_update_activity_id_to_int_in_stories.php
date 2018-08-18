<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivityIdToIntInStories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('stories', function (Blueprint $table) {
//           $table->integer('activity_id')->change();
//        });
        \DB::statement("ALTER TABLE stories ALTER COLUMN activity_id TYPE integer USING (activity_id::integer);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->string('activity_id')->change();
        });
    }
}
