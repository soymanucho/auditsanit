<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('snr_category');
            $table->string('jury_person');
            $table->boolean('dependency_additional');
            $table->bigInteger('address_id')->unsigned();
            $table->bigInteger('auditor_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('auditor_id')->references('id')->on('auditors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}