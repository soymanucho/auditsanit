<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('person_id')->unsigned();
            $table->string('license');
            $table->boolean('isNationalLicense');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('medics', function (Blueprint $table) {
              $table->foreign('person_id')->references('id')->on('people');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medics');
    }
}
