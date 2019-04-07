<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('module_type_id')->unsigned();
            $table->bigInteger('module_category_id')->unsigned();
            $table->decimal('price',12,2);
            $table->timestamps();
        });
        Schema::table('modules', function (Blueprint $table) {
            $table->foreign('module_category_id')->references('id')->on('module_categories');
            $table->foreign('module_type_id')->references('id')->on('module_types');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module');
    }
}
