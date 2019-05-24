<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedient_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('module_id')->unsigned();
            $table->decimal('price',12,2);
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('recommended_module_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('expedient_modules', function (Blueprint $table) {
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('recommended_module_id')->references('id')->on('modules');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedient_modules');
    }
}
