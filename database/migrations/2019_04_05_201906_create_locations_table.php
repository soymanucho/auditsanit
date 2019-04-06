<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
<<<<<<< HEAD
            $table->bigInteger('province_id')->unsigned();

        });

        Schema::table('locations', function (Blueprint $table) {

            $table->foreign('province_id')->references('id')->on('provinces');
=======
            $table->integer('province_id')->unsigned()->index()->nullable();
            // $table->foreign('province_id')->references('id')->on('provinces');
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
