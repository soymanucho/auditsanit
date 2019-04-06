<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('initial_datetime');
            $table->dateTime('final_datetime');
            $table->bigInteger('service_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('services_schedules', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_schedules');
    }
}
