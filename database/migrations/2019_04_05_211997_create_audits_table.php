<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('expedient_id')->unsigned()->unique();
            $table->string('conclution');
            $table->string('report');
            $table->timestamps();
        });

        Schema::table('audits', function (Blueprint $table) {
              $table->foreign('expedient_id')->references('id')->on('expedients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
}