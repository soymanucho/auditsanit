<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medic_id')->unsigned();
            $table->bigInteger('indicationType_id')->unsigned();
            $table->integer('numberOfSesions');
            $table->boolean('aditionalDependance');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('indications', function (Blueprint $table) {
          $table->foreign('medic_id')->references('id')->on('medics');
          $table->foreign('indicationType_id')->references('id')->on('indication_types');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indications');
    }
}
