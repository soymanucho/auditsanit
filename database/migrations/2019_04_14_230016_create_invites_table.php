<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('surname');
            $table->integer('dni');
            $table->string('token',16)->unique();
            $table->timestamps();
        });

        Schema::table('invites', function (Blueprint $table) {
              $table->foreign('client_id')->references('id')->on('clients');
          //    $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invites');
    }
}
