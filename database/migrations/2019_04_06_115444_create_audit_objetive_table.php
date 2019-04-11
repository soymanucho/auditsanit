<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditObjetiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits_objetives', function (Blueprint $table) {
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('objetive_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('audits_objetives', function (Blueprint $table) {
              $table->foreign('audit_id')->references('id')->on('audits');
              $table->foreign('objetive_id')->references('id')->on('objetives');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits_objetives');
    }
}
