<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('expedients', function (Blueprint $table) {
              $table->foreign('client_id')->references('id')->on('clients');
              $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedients');
    }
}
