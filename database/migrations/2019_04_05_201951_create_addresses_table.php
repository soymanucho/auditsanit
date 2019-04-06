<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street');
            $table->integer('number');
            $table->string('floor')->nullable();
            $table->double('latitude')->nullable()->index();
            $table->double('longitude')->nullable()->index();
<<<<<<< HEAD
            $table->bigInteger('location_id')->unsigned();

=======
            $table->integer('location_id')->nullable()->index()->unsigned();
            // $table->foreign('location_id')->references('id')->on('locations');
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {

            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
