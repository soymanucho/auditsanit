<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('expedient_module_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('transport_service_id')->nullable()->unsigned();
            $table->bigInteger('auditor_id')->nullable()->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->longText('report')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('medical_services', function (Blueprint $table) {
            $table->foreign('expedient_module_id')->references('id')->on('expedient_modules');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('transport_service_id')->references('id')->on('transport_services');
            $table->foreign('auditor_id')->references('id')->on('auditors');
            $table->foreign('status_id')->references('id')->on('medical_service_statuses');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_services');
    }
}
