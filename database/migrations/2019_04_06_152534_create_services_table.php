<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('service_type_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('service_type_id')->references('id')->on('service_types');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
