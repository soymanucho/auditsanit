<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('diagnosisType_id')->unsigned();
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('diagnoses', function (Blueprint $table) {
              $table->foreign('expedient_id')->references('id')->on('expedients');
              $table->foreign('diagnosisType_id')->references('id')->on('diagnosis_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnoses');
    }
}
