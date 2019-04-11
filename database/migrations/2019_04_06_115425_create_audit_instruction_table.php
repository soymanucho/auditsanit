<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditInstructionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits_instructions', function (Blueprint $table) {
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('instruction_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('audits_instructions', function (Blueprint $table) {
              $table->foreign('audit_id')->references('id')->on('audits');
              $table->foreign('instruction_id')->references('id')->on('instructions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits_instructions');
    }
}
