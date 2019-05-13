<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('clients_users', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');

          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_users');
    }
}
