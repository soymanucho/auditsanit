<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->integer('dni');
            $table->datetime('birth_date');
<<<<<<< HEAD
            $table->bigInteger('genre_id')->unsigned();
=======
            $table->integer('genre_id')->unsigned()->index()->nullable();
            // $table->foreign('genre_id')->references('id')->on('genres');
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b
            $table->timestamps();
        });

        Schema::table('people', function (Blueprint $table) {

            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
