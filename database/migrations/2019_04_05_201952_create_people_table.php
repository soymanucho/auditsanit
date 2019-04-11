<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
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

            $table->bigInteger('address_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('people', function (Blueprint $table) {

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('gender_id')->references('id')->on('genders');
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
