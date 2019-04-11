<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits_statuses', function (Blueprint $table) {
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('audits_statuses', function (Blueprint $table) {
              $table->foreign('audit_id')->references('id')->on('audits');
              $table->foreign('status_id')->references('id')->on('statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits_statuses');
    }
}
