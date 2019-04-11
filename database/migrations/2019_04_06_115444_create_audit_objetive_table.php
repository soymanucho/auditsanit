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
        Schema::create('audits_objectives', function (Blueprint $table) {
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('objective_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('audits_objectives', function (Blueprint $table) {
              $table->foreign('audit_id')->references('id')->on('audits');
              $table->foreign('objective_id')->references('id')->on('objectives');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits_objectives');
    }
}
