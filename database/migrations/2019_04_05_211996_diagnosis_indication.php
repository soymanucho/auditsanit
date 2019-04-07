<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosisIndication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('diagnosis_indications', function (Blueprint $table) {

          $table->bigInteger('diagnosis_id')->unsigned();
          $table->bigInteger('indication_id')->unsigned();
          $table->timestamps();
      });

      Schema::table('diagnosis_indications', function (Blueprint $table) {
        $table->foreign('diagnosis_id')->references('id')->on('diagnoses');
        $table->foreign('indication_id')->references('id')->on('indications');
          $table->unique(['diagnosis_id', 'indication_id']);


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('diagnosis_indications');//
    }
}
