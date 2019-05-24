<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('initial_datetime');
            $table->dateTime('final_datetime');
            $table->bigInteger('service_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('service_schedules', function (Blueprint $table) {
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
        Schema::dropIfExists('service_schedules');
    }
}
